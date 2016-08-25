<?php

namespace ModuleFormation\Services;

use Log;

use ModuleFormation\Repositories\InscriptionRepositoryInterface;

class PrintService implements PrintServiceInterface {

    private $inscriptionRepository;

    public function __construct(InscriptionRepositoryInterface $inscriptionRepository) {
        $this->inscriptionRepository = $inscriptionRepository;

    }

    public function prepareContratParameters($inscription_id) {
        $inscription = $this->inscriptionRepository->find($inscription_id);

        $ret = array();
        $ret["inscription_id"] = $inscription_id;
        $ret["nom_prenom_stagiaire"] = $inscription->stagiaire->prenom . " " . $inscription->stagiaire->nom;
        $ret["libelle_module"] = $inscription->session->module->libelle;

        if($inscription->session->firstDate != null) {
            if($inscription->session->lastDate != null) {
                $ret["dates"] = "du " . \Carbon\Carbon::createFromFormat('Y-m-d\TH:i:s.u\Z', $inscription->session->firstDate)->format('d/m/Y');
                $ret["dates"] .= " au " . \Carbon\Carbon::createFromFormat('Y-m-d\TH:i:s.u\Z', $inscription->session->lastDate)->format('d/m/Y');
            } else {
                $ret["dates"] = "le " . \Carbon\Carbon::createFromFormat('Y-m-d\TH:i:s.u\Z', $inscription->session->firstDate)->format('d/m/Y');
            }
        } else {
            $ret["dates"] = "";
        }

        $ret["duree"] = $this->calculateDuree($inscription->session);
        $ret["effectif"] = $inscription->session->effectif_max;

        return $ret;
    }


    private function calculateDuree($session) {
        $ret = 0;
        foreach($session->session_jours as $session_jour) {
            if($session_jour->heure_debut_matin != null && $session_jour->heure_fin_matin != null) {
                $ret += 3.5;
            }
            if($session_jour->heure_debut_apresmidi != null && $session_jour->heure_fin_apresmidi != null) {
                $ret += 3.5;
            }
        }
        return $ret;
    }
}