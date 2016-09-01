<?php

namespace ModuleFormation\Services;

use Log;

use ModuleFormation\Repositories\InscriptionRepositoryInterface;
use ModuleFormation\Repositories\SessionRepositoryInterface;
use ModuleFormation\Repositories\ParametreRepositoryInterface;

class PrintService implements PrintServiceInterface {

    private $inscriptionRepository;
    private $sessionRepository;
    private $parametreRepository;


    public function __construct(InscriptionRepositoryInterface $inscriptionRepository,
        SessionRepositoryInterface $sessionRepository, 
        ParametreRepositoryInterface $parametreRepository) {

        $this->inscriptionRepository = $inscriptionRepository;
        $this->sessionRepository = $sessionRepository;
        $this->parametreRepository = $parametreRepository;

    }

    public function prepareContratParameters($inscription) {
        $ret = array();
        $ret["inscription_id"] = $inscription->id;
        $ret["nom_prenom_stagiaire"] = $inscription->stagiaire->prenom . " " . $inscription->stagiaire->nom;
        $ret["adresse_stagiaire"] = $inscription->stagiaire->adresse . " " . $inscription->stagiaire->code_postal . " " . $inscription->stagiaire->ville;
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
        $ret["montant"] = $inscription->tarif->montant;

        return $ret;
    }

    public function prepareEmargementParameters($session) {
        $ret = array();

        $ret["session"] = $session;
        $ret["inscriptions"] = $this->inscriptionRepository->findBy([
            'session_id' => $session->id, 
            'statut' => \ModuleFormation\Inscription::STATUS_VALIDATED
            ]);
        $ret["responsableFormation"] = $this->parametreRepository->responsableFormation();

        return $ret;
    }

    public function prepareSuiviSessionParameters($session) {

        $ret = array();

        $ret["session"] = $session;
        $ret["nb_minutes"] = $this->sessionRepository->getDuree($session);
        $ret["formateurs"] = $this->sessionRepository->getFormateurs($session);

        return $ret;
    }

    public function prepapreAttestationParameters($session) {
        $inscriptions = $this->inscriptionRepository->findBy([
            'session_id' => $session->id, 
            'statut' => \ModuleFormation\Inscription::STATUS_VALIDATED
            ], false);

        $formateurs = array();
        foreach($session->session_jours as $session_jour) {
            foreach($session_jour->formateurs as $formateur) {
                $formateurs[$formateur->id] = $formateur;
            }
        }

        $ret = [
            'session' => $session,
            'inscriptions' => $inscriptions,
            'dureeFormation' => $this->calculateDuree($session),
            'formateurs' => $formateurs,
            'responsableFormation' => $this->parametreRepository->responsableFormation()
        ];

        return $ret;
    }

    public function getSessionLibelleForTitle($session) {
        //Get the dates
        $firstDate = \Carbon\Carbon::createFromFormat('Y-m-d\TH:i:s.u\Z', $session->firstDate)->format('d/m/Y');
        if($session->lastDate != null) {
            $lastDate = \Carbon\Carbon::createFromFormat('Y-m-d\TH:i:s.u\Z', $session->lastDate)->format('d/m/Y');
        }

        //Format a string
        $ret = $session->module->libelle;
        if($session->lastDate != null) {
            $ret .= ' (' . $firstDate . ' - ' . $lastDate . ')';
        } else {
            $ret .= ' (' . $firstDate . ')';
        }

        return $ret;
    } 

    public function getLibelleForContrat($inscription) {
        $stagiaire_name = $inscription->stagiaire->prenom . " " . $inscription->stagiaire->nom;
        $module_label = $inscription->session->module->libelle;

        $ret = $stagiaire_name . ' - ' . $module_label;

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