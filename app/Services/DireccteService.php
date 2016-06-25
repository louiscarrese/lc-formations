<?php 
namespace ModuleFormation\Services;

use Carbon;
use Log;

use ModuleFormation\Repositories\SessionJourRepositoryInterface;
use ModuleFormation\Repositories\FormateurRepositoryInterface;

use ModuleFormation\Formateur;
use ModuleFormation\FormateurType;
use ModuleFormation\FinanceurInscription;
use ModuleFormation\Inscription;
use ModuleFormation\SessionJour;

class DireccteService implements DireccteServiceInterface
{
    private $sessionJourRepository;
    private $formateurRepository;

    public function __construct(
        SessionJourRepositoryInterface $sessionJourRepository,
        FormateurRepositoryInterface $formateurRepository) {
        $this->sessionJourRepository = $sessionJourRepository;
        $this->formateurRepository = $formateurRepository;
    }

    /** Function naming : 
     * G / BF / BP : Général / Bilan Financier hors taxes / Bilan Pédagogique
     **/

    /** GENERAL */
    public function G_D($date_min, $date_max) {

        $formateur_types = FormateurType::all();

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
        $nb_jours = Formateur::where('formateur_type_id', '=', $formateur_type)
            ->whereHas('session_jours', function($q) use ($date_min, $date_max) {
                $q->whereBetween('date', [$date_min, $date_max]);
            })
            ->count();

        return $nb_jours;
    }

    private function G_D_sum($date_min, $date_max, $formateur_type_id) {
        $session_jours = SessionJour::whereBetween('date', [$date_min, $date_max])
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
    public function BF_A($date_min, $date_max) {
        $ret = array();
        $ret['total'] = 0;

        $ret['A1_a'] = $this->BF_A_A1_a($date_min, $date_max);
        $ret['A1_a_prime'] = $this->BF_A_A1_a_prime($date_min, $date_max);
        $ret['A2_a'] = $this->BF_A_A2_a($date_min, $date_max);
        $ret['A3_a'] = $this->BF_A_A3_a($date_min, $date_max);
        $ret['A4'] = $this->BF_A_A4($date_min, $date_max);

    }

    private function BF_A_A1_a($date_min, $date_max) {
        //La somme des montants de financement pour lesquels le financeur est l'employeur et le stagiaire salarie
        $somme = FinanceurInscription::where('financeur_id', '=', 2)
            ->whereHas('inscription', function($q) {
                $q->where('statut', '=', Inscription::STATUS_VALIDATED);
            })
            ->whereHas('inscription.stagiaire.stagiaire_type', function($q) {
                $q->where('is_salarie', '=', true);
            })
            ->whereHas('inscription.session.session_jours', function($q) use ($date_min, $date_max) {
                $q->whereBetween('date', [$date_min, $date_max]);
            })->sum('montant');

        return $somme;
    }

    private function BF_A_A1_a_prime($date_min, $date_max) {
        //La somme des montants de financement pour lesquels le financeur est l'employeur et le stagiaire salarie et en contrat pro
        $somme = FinanceurInscription::where('financeur_id', '=', 2)
            ->whereHas('inscription', function($q) {
                $q->where('statut', '=', Inscription::STATUS_VALIDATED);
            })
            ->whereHas('inscription.stagiaire.stagiaire_type', function($q) {
                $q->where('is_salarie', '=', true)->where('is_contrat_pro', '=', true);
            })
            ->whereHas('inscription.session.session_jours', function($q) use ($date_min, $date_max) {
                $q->whereBetween('date', [$date_min, $date_max]);
            })->sum('montant');

        return $somme;
    }

    private function BF_A_A2_a($date_min, $date_max) {
        //La somme des montants de financement pour lesquels le financeur est l'employeur
        $somme = FinanceurInscription::where('financeur_id', '=', 3)
            ->whereHas('inscription', function($q) {
                $q->where('statut', '=', Inscription::STATUS_VALIDATED);
            })
            ->whereHas('inscription.session.session_jours', function($q) use ($date_min, $date_max) {
                $q->whereBetween('date', [$date_min, $date_max]);
            })->sum('montant');

        return $somme;
    }

    private function BF_A_A3_a($date_min, $date_max) {
        //La somme des montants de financement pour lesquels le financeur est l'employeur
        $somme = FinanceurInscription::where('financeur_id', '=', 2)
            ->whereHas('inscription', function($q) {
                $q->where('statut', '=', Inscription::STATUS_VALIDATED);
            })
            ->whereHas('inscription.stagiaire.stagiaire_type', function($q) {
                $q->where('is_salarie', '=', true)->where('is_fonctionnaire', '=', true);
            })
            ->whereHas('inscription.session.session_jours', function($q) use ($date_min, $date_max) {
                $q->whereBetween('date', [$date_min, $date_max]);
            })->sum('montant');

        return $somme;
    }

    private function BF_A_A4($date_min, $date_max) {
        //La somme des montants de financement pour lesquels le financeur est l'employeur
        $somme = FinanceurInscription::where('financeur_id', '=', 1)
            ->whereHas('inscription', function($q) {
                $q->where('statut', '=', Inscription::STATUS_VALIDATED);
            })
            ->whereHas('inscription.session.session_jours', function($q) use ($date_min, $date_max) {
                $q->whereBetween('date', [$date_min, $date_max]);
            })->sum('montant');

        return $somme;
    }

    /** BILAN PEDAGOGIQUE */
    public function BP_A($date_min, $date_max) {
        $ret = array();
    }
}
