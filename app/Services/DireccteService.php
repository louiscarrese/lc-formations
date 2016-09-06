<?php 
namespace ModuleFormation\Services;

use Carbon;
use Log;

use DB;

use ModuleFormation\Repositories\FinanceurInscriptionRepositoryInterface;
use ModuleFormation\Repositories\FinanceurTypeRepositoryInterface;
use ModuleFormation\Repositories\FormateurRepositoryInterface;
use ModuleFormation\Repositories\FormateurTypeRepositoryInterface;
use ModuleFormation\Repositories\InscriptionRepositoryInterface;
use ModuleFormation\Repositories\SessionJourRepositoryInterface;

use ModuleFormation\Formateur;
use ModuleFormation\FormateurType;
use ModuleFormation\FinanceurInscription;
use ModuleFormation\Inscription;
use ModuleFormation\SessionJour;

class DireccteService implements DireccteServiceInterface
{
    private $financeurInscriptionRepository;
    private $financeurTypeRepository;
    private $formateurRepository;
    private $formateurTypeRepository;
    private $inscriptionRepository;
    private $sessionJourRepository;


    public function __construct(
        FinanceurInscriptionRepositoryInterface $financeurInscriptionRepository,
        FinanceurTypeRepositoryInterface $financeurTypeRepository,
        FormateurRepositoryInterface $formateurRepository,
        FormateurTypeRepositoryInterface $formateurTypeRepository,
        InscriptionRepositoryInterface $inscriptionRepository,
        SessionJourRepositoryInterface $sessionJourRepository
    ) {
        $this->financeurInscriptionRepository = $financeurInscriptionRepository;
        $this->financeurTypeRepository = $financeurTypeRepository;
        $this->formateurRepository = $formateurRepository;
        $this->formateurTypeRepository = $formateurTypeRepository;
        $this->inscriptionRepository = $inscriptionRepository;
        $this->sessionJourRepository = $sessionJourRepository;
    }

    /** Function naming : 
     * G / BF / BP : Général / Bilan Financier hors taxes / Bilan Pédagogique
     **/

    /** GENERAL */
    public function G_D($date_min, $date_max) {

        $formateur_types = $this->formateurTypeRepository->getAll()['data'];

        $ret = array();
        $ret['data'] = array();
        $ret['total'] = ['nombre' => 0, 'somme' => 0];

        foreach($formateur_types as $formateur_type) {
            $nombre = $this->G_D_count($date_min, $date_max, $formateur_type->id);
            $somme = $this->G_D_sum($date_min, $date_max, $formateur_type->id);

            $ret['data'][$formateur_type->libelle] = ['nombre' => $nombre, 'somme' => $somme];
            $ret['total']['nombre'] += $nombre;
            $ret['total']['somme'] += $somme;
        }
        return $ret;
    }

    private function G_D_count($date_min, $date_max, $formateur_type) {
        $nb_jours = $this->formateurRepository->model()
            ->where('formateur_type_id', '=', $formateur_type)
            ->whereHas('session_jours', function($q) use ($date_min, $date_max) {
                $q->whereBetween('date', [$date_min, $date_max]);
            })
            ->count();

        return $nb_jours;
    }

    private function G_D_sum($date_min, $date_max, $formateur_type_id) {
        $session_jours = $this->sessionJourRepository->model()
            ->whereBetween('date', [$date_min, $date_max])
            ->whereHas('formateurs', function($q) use ($formateur_type_id) {
                $q->where('formateur_type_id', '=', $formateur_type_id);
            })->get();

        $nb_heures = 0;
        foreach($session_jours as $session_jour) {
            if($session_jour->heure_debut_matin != null && $session_jour->heure_fin_matin != null) {
                $nb_heures += 3.5;
            }
            if($session_jour->heure_debut_apresmidi != null && $session_jour->heure_fin_apresmidi != null) {
                $nb_heures += 3.5;
            }
        }

        return $nb_heures;
    }

    /** BILAN FINANCIER */
    public function BF($date_min, $date_max) {
        $ret = array();

        $ret['A_A1_a'] = $this->BF_A($date_min, $date_max, 2, true, false, null);
        $ret['A_A1_a_prime'] = $this->BF_A($date_min, $date_max, 2, true, false, true);

        $ret['A2_a'] = $this->BF_A($date_min, $date_max, 3, null, null, null);

        $ret['A3_a'] = $this->BF_A($date_min, $date_max, 2, true, true, null);
        $ret['A3_b'] = $this->BF_A($date_min, $date_max, 4, true, false, null);
        $ret['A3_c'] = $this->BF_A($date_min, $date_max, 5, true, false, null);
        $ret['A3_d'] = $this->BF_A($date_min, $date_max, 6, true, false, null);
        $ret['A3_e'] = $this->BF_A($date_min, $date_max, 7, true, false, null);
        $ret['A3_f'] = $this->BF_A($date_min, $date_max, 8, true, false, null);

        $ret['A4'] = $this->BF_A($date_min, $date_max, 1, null, null, null);

        $ret['total'] = $ret['A_A1_a'] 
            + $ret['A_A1_a_prime'] 
            + $ret['A2_a'] 
            + $ret['A3_a'] 
            + $ret['A3_b'] 
            + $ret['A3_c'] 
            + $ret['A3_d'] 
            + $ret['A3_e'] 
            + $ret['A3_f'] 
            + $ret['A4'];

        return $ret;
    }


    private function BF_A($date_min, $date_max, $financeur_type, $salarie = null, $fonctionnaire = null, $contrat_pro = null) {
        $req = $this->financeurInscriptionRepository->model()
            ->whereHas('inscription', function($q) {
                $q->where('statut', '=', Inscription::STATUS_VALIDATED);
            })
            ->whereHas('inscription.session.session_jours', function($q) use ($date_min, $date_max) {
                $q->whereBetween('date', [$date_min, $date_max]);
            })
            ->whereHas('financeur', function($q) use ($financeur_type) {
                $q->where('financeur_type_id', '=', $financeur_type);
            });

            if($salarie != null || $fonctionnaire != null || $contrat_pro != null) {
                $req->whereHas('inscription.stagiaire.stagiaire_type', function($q) use ($salarie, $fonctionnaire, $contrat_pro) {
                    if($salarie != null)
                        $q->where('is_salarie', '=', $salarie);

                    if($fonctionnaire != null)
                        $q->where('is_fonctionnaire', '=', $fonctionnaire);

                    if($contrat_pro != null)
                        $q->where('is_contrat_pro', '=', $contrat_pro);
                });
            }

        return $req->sum('montant');
    }

    /** BILAN PEDAGOGIQUE */
    public function BP($date_min, $date_max) {
        $ret = array();

        // A Types de stagiaires de l'organisme
        $ret['A_1'] = $this->BP_A($date_min, $date_max, [2], true, null, null);
        $ret['A_1_prime'] = $this->BP_A($date_min, $date_max, [2], true, null, true);
        $ret['A_2'] = $this->BP_A($date_min, $date_max, [4, 5, 6, 7, 8], null, true, null);
        $ret['A_3'] = $this->BP_A($date_min, $date_max, [1], null, null, null);

        $ret['A_total'] = $this->BP_A($date_min, $date_max, null, null, null, null);

        $ret['A_4']['nb_stagiaires'] = $ret['A_total']['nb_stagiaires'] - 
            ($ret['A_1']['nb_stagiaires'] + $ret['A_2']['nb_stagiaires'] + $ret['A_3']['nb_stagiaires']);
        $ret['A_4']['nb_heures'] = $ret['A_total']['nb_heures'] - 
            ($ret['A_1']['nb_heures'] + $ret['A_2']['nb_heures'] + $ret['A_3']['nb_heures']);


        $ret['B_1'] = $this->BP_B($date_min, $date_max, false);
        $ret['B_3'] = $this->BP_B($date_min, $date_max, true);

        $ret['D'] = $this->BP_D($date_min, $date_max);

        return $ret;
    }

    private function BP_A($date_min, $date_max, $financeur_types, $salarie = null, $demandeur_emploi = null, $contrat_pro = null) {
        return [
            'nb_stagiaires' => $this->BP_A_nb_stagiaires($date_min, $date_max, $financeur_types, $salarie, $demandeur_emploi, $contrat_pro),
            'nb_heures' => $this->BP_A_nb_heures($date_min, $date_max, $financeur_types, $salarie, $demandeur_emploi, $contrat_pro),
        ];
    }

    private function BP_A_nb_stagiaires($date_min, $date_max, $financeur_types, $salarie = null, $demandeur_emploi = null, $contrat_pro = null) {
        $req = $this->inscriptionRepository->model()
            ->where('statut', '=', Inscription::STATUS_VALIDATED)
            ->whereHas('session.session_jours', function($q) use ($date_min, $date_max) {
                $q->whereBetween('date', [$date_min, $date_max]);
            });

        if($financeur_types != null) {
            $req->whereHas('financements.financeur', function($q) use ($financeur_types) {
                $q->whereIn('financeur_type_id', $financeur_types);
            });
        }

        if($salarie != null || $demandeur_emploi != null || $contrat_pro != null) {
            $req->whereHas('stagiaire.stagiaire_type', function($q) use ($salarie, $demandeur_emploi, $contrat_pro) {
                if($salarie != null)
                    $q->where('is_salarie', '=', $salarie);

                if($demandeur_emploi != null)
                    $q->where('is_demandeur_emploi', '=', $demandeur_emploi);

                if($contrat_pro != null)
                    $q->where('is_contrat_pro', '=', $contrat_pro);
            });
        }

        $nb_stagiaires = $req->lists('stagiaire_id')->unique()->count();

        return $nb_stagiaires;
    }

    private function BP_A_nb_heures($date_min, $date_max, $financeur_types, $salarie = null, $demandeur_emploi = null, $contrat_pro = null) {
        $req = $this->sessionJourRepository->model()
            ->whereHas('session.inscriptions', function($q) {
                $q->where('statut', '=', Inscription::STATUS_VALIDATED);
            })
            ->whereBetween('date', [$date_min, $date_max]);

        if($financeur_types != null) {
            $req->whereHas('session.inscriptions.financements.financeur', function($q) use ($financeur_types) {
                $q->whereIn('financeur_type_id', $financeur_types);
            });
        }

        if($salarie != null || $demandeur_emploi != null || $contrat_pro != null) {
            $req->whereHas('session.inscriptions.stagiaire.stagiaire_type', function($q) use ($salarie, $demandeur_emploi, $contrat_pro) {
                if($salarie != null)
                    $q->where('is_salarie', '=', $salarie);

                if($demandeur_emploi != null)
                    $q->where('is_demandeur_emploi', '=', $demandeur_emploi);

                if($contrat_pro != null)
                    $q->where('is_contrat_pro', '=', $contrat_pro);
            });
        }


        $nb_heures = 0;
        $session_jours = $req->get();
        foreach($session_jours as $session_jour) {
            if($session_jour->heure_debut_matin != null && $session_jour->heure_fin_matin != null) {
                $nb_heures += 3.5;
            }
            if($session_jour->heure_debut_apresmidi != null && $session_jour->heure_fin_apresmidi != null) {
                $nb_heures += 3.5;
            }

        }

        return $nb_heures;
    }

    private function BP_B($date_min, $date_max, $portage = null) {
        return [
            'nb_stagiaires' => $this->BP_B_nb_stagiaires($date_min, $date_max, $portage),
            'nb_heures' => $this->BP_B_nb_heures($date_min, $date_max, $portage)
        ];
    }

    private function BP_B_nb_stagiaires($date_min, $date_max, $portage) {
        $req = $this->inscriptionRepository->model()
            ->where('statut', '=', Inscription::STATUS_VALIDATED)
            ->whereHas('session.session_jours', function ($q) use ($date_min, $date_max) {
                $q->whereBetween('date', [$date_min, $date_max]);
            })
            ->whereHas('session.module', function ($q) use ($portage) {
                $q->where('portage', '=', $portage);
            });

        $nb_stagiaires = $req->lists('stagiaire_id')->unique()->count();

        return $nb_stagiaires;
    }

    private function BP_B_nb_heures($date_min, $date_max, $portage) {
        $req = $this->sessionJourRepository->model()
            ->whereHas('session.inscriptions', function($q) {
                $q->where('statut', '=', Inscription::STATUS_VALIDATED);
            })
            ->whereBetween('date', [$date_min, $date_max])
            ->whereHas('session.module', function ($q) use ($portage) {
                $q->where('portage', '=', $portage);
            });

        $nb_heures = 0;
        $session_jours = $req->get();
        foreach($session_jours as $session_jour) {
            if($session_jour->heure_debut_matin != null && $session_jour->heure_fin_matin != null) {
                $nb_heures += 3.5;
            }
            if($session_jour->heure_debut_apresmidi != null && $session_jour->heure_fin_apresmidi != null) {
                $nb_heures += 3.5;
            }

        }

        return $nb_heures;
    }

    private function BP_D($date_min, $date_max) {
        $nb_stagiaires = $this->BP_D_nb_stagiaires($date_min, $date_max);
        $nb_heures = $this->BP_D_nb_heures($date_min, $date_max);

        $ret = array();
        foreach($nb_stagiaires as $code_formation => $nb_stagiaire) {
            if(!isset($ret[$code_formation])) {
                $ret[$code_formation] = array();
            }

            $ret[$code_formation]['nb_stagiaires'] = $nb_stagiaire;
        }
        foreach($nb_heures as $code_formation => $nb_heure) {
            if(!isset($ret[$code_formation])) {
                $ret[$code_formation] = array();
            }

            $ret[$code_formation]['nb_heures'] = $nb_heure;
        }

        return $ret;
    }

    private function BP_D_nb_stagiaires($date_min, $date_max) {
        $datas = $this->inscriptionRepository->model()
            ->join('sessions', 'inscriptions.session_id', '=', 'sessions.id')
            ->join('modules', 'sessions.module_id', '=', 'modules.id')
            ->where('statut', '=', Inscription::STATUS_VALIDATED)
            ->whereHas('session.session_jours', function ($q) use ($date_min, $date_max) {
                $q->whereBetween('date', [$date_min, $date_max]);
            })
            ->groupBy('modules.code_formation')
            ->select('modules.code_formation',
                DB::Raw('count(distinct inscriptions.stagiaire_id)')
            )
            ->get();


            $ret = array();
            foreach($datas as $data) {
                $ret[$data['code_formation']] = $data['count'];
            }


            return $ret;
    }

    private function BP_D_nb_heures($date_min, $date_max) {
        $datas = $this->sessionJourRepository->model()
            ->join('sessions', 'session_jours.session_id', '=', 'sessions.id')
            ->join('inscriptions', 'sessions.id', '=', 'inscriptions.session_id')
            ->join('modules', 'sessions.module_id', '=', 'modules.id')
            ->where('inscriptions.statut', '=', Inscription::STATUS_VALIDATED)
            ->whereBetween('session_jours.date', [$date_min, $date_max])
            ->select('modules.code_formation', 'session_jours.heure_debut_matin')
            ->get();


        $ret = array();
        foreach($datas as $data) {
            if(!isset($ret[$data['code_formation']])) {
                $ret[$data['code_formation']] = array();
                $ret[$data['code_formation']] = 0;
            }


            $nb_demi_journee = 0;
            $nb_demi_journee += ($data['heure_debut_matin'] != null) ? 1 : 0;
            $nb_demi_journee += ($data['heure_debut_apresmidi'] != null) ? 1 : 0;
            $ret[$data['code_formation']] += 3.5 * $nb_demi_journee;
        }

        return $ret;
    }

}
