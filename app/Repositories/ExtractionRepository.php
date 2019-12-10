<?php
namespace ModuleFormation\Repositories;

use DB;
use Log;
use ModuleFormation\Module;

class ExtractionRepository implements ExtractionRepositoryInterface
{
    public function getByModule($min_date, $max_date) {
	$ret = array();

	$query = "
select
  m.libelle as module,
  m.id as module_id,
  count(distinct s.id) as nb_sessions,
  count(distinct i.id) as nb_inscriptions,
  count(distinct fsj.formateur_id) as nb_formateurs
from modules m
inner join sessions s on s.module_id = m.id
inner join session_jours sj on sj.session_id = s.id
inner join formateur_session_jour fsj on fsj.session_jour_id = sj.id
inner join inscriptions i on i.session_id = s.id
where 
  sj.date > :date_min and sj.date < :date_max
  and i.statut = 'validated'
  and s.canceled = 0
group by m.id
";

	$results = DB::select($query, ['date_min' => $min_date, 'date_max' => $max_date]);
	foreach($results as $result) {
	    $module = $result->module;
	    $ret[$module]['module_id'] = $result->module_id;
	    $ret[$module]['nb_sessions'] = $result->nb_sessions;
	    $ret[$module]['nb_inscriptions'] = $result->nb_inscriptions;
	    $ret[$module]['nb_formateurs'] = $result->nb_formateurs;
	    $ret[$module]['nb_heures_sessions'] = 0;
	    $ret[$module]['nb_heures_stagiaires'] = 0;
	}

	//On récupère le nombre d inscriptions validées à des sessions non annulées, par session
	$queryInscriptionsBySession = "
select
  s.id as session_id,
  count(distinct i.id) as nb_inscriptions
from
  sessions s
  left outer join inscriptions i on i.session_id = s.id and i.statut = 'validated'
where
  s.canceled = 0
group by s.id
";
	$resultInscriptions = DB::select($queryInscriptionsBySession);
	$inscriptionsBySessions = array();
	foreach($resultInscriptions as $result) {
	    $inscriptionsBySessions[$result->session_id] = $result->nb_inscriptions;
	}

	//On récupère le nombre d'heures de chaque session non annulées et son module
	$queryHeuresBySession = "
select 
  s.id as session_id,
  m.libelle as module,
  sum(
    (sj.heure_debut_matin is not null) * 3.5 + (sj.heure_debut_apresmidi is not null) * 3.5
  ) as nb_heures_session
from
  sessions s
  inner join modules m on s.module_id = m.id
  inner join session_jours sj on sj.session_id = s.id
where
  s.canceled = 0
  and sj.date > :date_min and sj.date < :date_max
group by s.id, m.libelle
";

	$resultsHeures = DB::select($queryHeuresBySession, ['date_min' => $min_date, 'date_max' => $max_date]);
	foreach($resultsHeures as $result) {
	    //Il est possible que des sessions ne soient pas annulées mais n'aient pas d'inscriptions ou de jours...
	    if($result->nb_heures_session > 0 && $inscriptionsBySessions[$result->session_id] > 0) {
		$module = $result->module;
		//On agrège par domaine de formation
		$ret[$module]['nb_heures_sessions'] += $result->nb_heures_session;
		$ret[$module]['nb_heures_stagiaires'] += ($result->nb_heures_session * $inscriptionsBySessions[$result->session_id]);
	    }
	}

	return $ret;
    }

    /**
     * Extraction de statistiques par domaine de formation.
     */
    public function getByDomaineFormation($min_date, $max_date) {
	$ret = array();

	/** On commence par récupérer les aggrégations simples sur les domaines de formations :
	 * - Nombre de modules
	 * - Nombre de sessions (non annulées)
	 * - Nombre d inscriptions validées
	 * - Nombre de formateurs
	 */
	$query = "
select 
  df.libelle as domaine, 
  count(distinct m.id) as nb_modules, 
  count(distinct s.id) as nb_sessions, 
  count(distinct i.id) as nb_inscriptions,
  count(distinct fsj.formateur_id) as nb_formateurs
from modules m
inner join domaine_formations df on m.domaine_formation_id = df.id
inner join sessions s on s.module_id = m.id
inner join session_jours sj on sj.session_id = s.id
inner join inscriptions i on i.session_id = s.id
inner join formateur_session_jour fsj on fsj.session_jour_id = sj.id
where 
  sj.date > :date_min and sj.date < :date_max
  and i.statut = 'validated'
  and s.canceled = 0
group by df.id
	";

	$results = DB::select($query, ['date_min' => $min_date, 'date_max' => $max_date]);
	foreach($results as $result) {
	    $domaine = $result->domaine;
	    $ret[$domaine] = array();
	    $ret[$domaine]['nb_modules'] = $result->nb_modules;
	    $ret[$domaine]['nb_sessions'] = $result->nb_sessions;
	    $ret[$domaine]['nb_inscriptions'] = $result->nb_inscriptions;
	    $ret[$domaine]['nb_formateurs'] = $result->nb_formateurs;
	    $ret[$domaine]['nb_heures_sessions'] = 0; //Sera calculé plus tard
	    $ret[$domaine]['nb_heures_stagiaires'] = 0; //Sera calculé plus tard
	}

	/**
	 * La suite des calculs doit se faire par session, et on doit faire l aggrégation
	 * par domaine de formation à la main...
	 */

	//On récupère le nombre d inscriptions validées à des sessions non annulées, par session
	$queryInscriptionsBySession = "
select
  s.id as session_id,
  count(distinct i.id) as nb_inscriptions
from
  sessions s
  left outer join inscriptions i on i.session_id = s.id and i.statut = 'validated'
where
  s.canceled = 0
group by s.id
";
	$resultInscriptions = DB::select($queryInscriptionsBySession);
	$inscriptionsBySessions = array();
	foreach($resultInscriptions as $result) {
	    $inscriptionsBySessions[$result->session_id] = $result->nb_inscriptions;
	}

	//On récupère le nombre d'heures de chaque session non annulées et son domaine de formation
	$queryHeuresBySession = "
select
  s.id as session_id,
  df.libelle as domaine,
  sum(
    (sj.heure_debut_matin is not null) * 3.5 + (sj.heure_debut_apresmidi is not null) * 3.5
  ) as nb_heures_session
from
  sessions s
  inner join modules m on s.module_id = m.id
  inner join domaine_formations df on m.domaine_formation_id = df.id
  inner join session_jours sj on sj.session_id = s.id
where
  s.canceled = 0
  and sj.date > :date_min and sj.date < :date_max
group by s.id, df.libelle
";

	$resultsHeures = DB::select($queryHeuresBySession, ['date_min' => $min_date, 'date_max' => $max_date]);
	foreach($resultsHeures as $result) {
	    //Il est possible que des sessions ne soient pas annulées mais n'aient pas d'inscriptions ou de jours...
	    if($result->nb_heures_session > 0 && $inscriptionsBySessions[$result->session_id] > 0) {
		$domaine = $result->domaine;
		//On agrège par domaine de formation
		$ret[$domaine]['nb_heures_sessions'] += $result->nb_heures_session;
		$ret[$domaine]['nb_heures_stagiaires'] += ($result->nb_heures_session * $inscriptionsBySessions[$result->session_id]);
	    }
	}

	return $ret;
    }

    public function csvInscription($min_date, $max_date) {
	$header = array('Module', 'Date', 'Code formation', 'Domaine', 'Portage', 'Nom', 'Prenom', 'Sexe', 'Code postal', 'Date de naissance', 'Type stagiaire', 'Profession', 'Heures', 'Financeur 1', 'Montant 1', 'Financeur 2', 'Montant 2');

	$query = "
select 
  m.libelle as module, 
  (select sj.date from session_jours sj where sj.session_id = se.id limit 1),
  m.code_formation as code_formation,
  df.libelle as domaine, 
  m.portage as portage,
  st.nom as nom,
  st.prenom as prenom,
  st.sexe as sexe,
  st.code_postal as code_postal,
  st.date_naissance as date_naissance,
  stt.libelle as type_stagiaire,
  st.profession as profession,
(select sum((sj.heure_debut_matin is not null) * 3.5 + (sj.heure_debut_apresmidi is not null) * 3.5)
 from session_jours sj
 where sj.session_id = se.id) as nombre_heures,
(select f.libelle as libelle
 from financeur_inscriptions fi
 inner join financeurs f on fi.financeur_id = f.id
 where fi.inscription_id = i.id
 order by fi.montant desc
 limit 1 offset 0) as financeur1,
(select fi.montant as montant
 from financeur_inscriptions fi
 where fi.inscription_id = i.id
 order by fi.montant desc
 limit 1 offset 0) as montant1,
(select f.libelle as libelle
 from financeur_inscriptions fi
 inner join financeurs f on fi.financeur_id = f.id
 where fi.inscription_id = i.id
 order by fi.montant desc
 limit 1 offset 1) as financeur2,
(select fi.montant as montant
 from financeur_inscriptions fi
 where fi.inscription_id = i.id
 order by fi.montant desc
 limit 1 offset 1) as montant2
from inscriptions i 
  inner join sessions se on i.session_id = se.id 
  inner join modules m on se.module_id = m.id 
  inner join domaine_formations df on m.domaine_formation_id = df.id 
  inner join stagiaires st on i.stagiaire_id = st.id
  inner join stagiaire_types stt on st.stagiaire_type_id = stt.id
where
  se.canceled = 0
  and i.statut = 'validated'
  and se.id in (select distinct session_id from session_jours where date > :date_min and date < :date_max)
";

	DB::setFetchMode(\PDO::FETCH_ASSOC);
	$result = DB::select($query, ['date_min' => $min_date, 'date_max' => $max_date]);
	return array_merge(array($header), $result);
    }
}
