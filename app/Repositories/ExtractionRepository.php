<?php
namespace ModuleFormation\Repositories;

use DB;
use ModuleFormation\Module;

class ExtractionRepository implements ExtractionRepositoryInterface
{
    public function getByModule($min_date, $max_date) {
	$query = "
select
  m.libelle as module,
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
group by m.id
";

	$ret = array();
	$results = DB::select($query, ['date_min' => $min_date, 'date_max' => $max_date]);
	foreach($results as $result) {
	    $module = $result->module;
	    $ret[$module]['nb_sessions'] = $result->nb_sessions;
	    $ret[$module]['nb_inscriptions'] = $result->nb_inscriptions;
	    $ret[$module]['nb_formateurs'] = $result->nb_formateurs;
	}

	$queryHeures = "
select 
  m.libelle as module,
  sum(
    (sj.heure_debut_matin is not null) * 3.5 + (sj.heure_debut_apresmidi is not null) * 3.5
  ) as nb_heures_sessions
from modules m
inner join sessions s on s.module_id = m.id
inner join session_jours sj on sj.session_id = s.id
where
  sj.date > :date_min and sj.date < :date_max 
group by m.id
";

	$resultsHeures = DB::select($queryHeures, ['date_min' => $min_date, 'date_max' => $max_date]);
	foreach($resultsHeures as $result) {
	    $module = $result->module;
	    $ret[$module]['nb_heures_sessions'] = $result->nb_heures_sessions;
	    $ret[$module]['nb_heures_stagiaires'] = $ret[$module]['nb_heures_sessions'] * $ret[$module]['nb_inscriptions'];
	}
	return $ret;
    }


    public function getByDomaineFormation($min_date, $max_date) {
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
group by df.id
	";

	$results = DB::select($query, ['date_min' => $min_date, 'date_max' => $max_date]);

	$ret = array();
	foreach($results as $result) {
	    $domaine = $result->domaine;
	    $ret[$domaine] = array();
	    $ret[$domaine]['nb_modules'] = $result->nb_modules;
	    $ret[$domaine]['nb_sessions'] = $result->nb_sessions;
	    $ret[$domaine]['nb_inscriptions'] = $result->nb_inscriptions;
	    $ret[$domaine]['nb_formateurs'] = $result->nb_formateurs;
	}

	$queryHeures = "
select
  df.libelle as domaine,
  sum(
    (sj.heure_debut_matin is not null) * 3.5 + (sj.heure_debut_apresmidi is not null) * 3.5
  ) as nb_heures_sessions
from modules m
inner join domaine_formations df on m.domaine_formation_id = df.id
inner join sessions s on s.module_id = m.id
inner join session_jours sj on sj.session_id = s.id
where
  sj.date > :date_min and sj.date < :date_max 
group by df.id
";
	$resultsHeures = DB::select($queryHeures, ['date_min' => $min_date, 'date_max' => $max_date]);

	foreach($resultsHeures as $result) {
	    $domaine = $result->domaine;
	    $ret[$domaine]['nb_heures_sessions'] = $result->nb_heures_sessions;
	    $ret[$domaine]['nb_heures_stagiaires'] = $ret[$domaine]['nb_heures_sessions'] * $ret[$domaine]['nb_inscriptions'];
	}
	    


	return $ret;
    }
}
