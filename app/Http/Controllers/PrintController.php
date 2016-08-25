<?php

namespace ModuleFormation\Http\Controllers;
use Log;

use Illuminate\Http\Request;
use ModuleFormation\Http\Requests;
use ModuleFormation\Http\Controllers\Controller;
use ModuleFormation\Repositories\SessionRepositoryInterface;
use ModuleFormation\Repositories\InscriptionRepositoryInterface;
use ModuleFormation\Repositories\ParametreRepositoryInterface;
use ModuleFormation\Services\PrintServiceInterface;
use PDF;


class PrintController extends Controller
{

    public function emargement(SessionRepositoryInterface $sessionRepository, 
        InscriptionRepositoryInterface $inscriptionRepository, 
        ParametreRepositoryInterface $parametreRepository,
        $session_id) {
        $session = $sessionRepository->find($session_id);
        $inscriptions = $inscriptionRepository->findBy([
            'session_id' => $session_id, 
            'statut' => \ModuleFormation\Inscription::STATUS_VALIDATED
            ]);


        $pdf = PDF::loadView('print.emargement', [
            'session' => $session, 
            'inscriptions' => $inscriptions,
            'responsableFormation' => $parametreRepository->responsableFormation()
            ]);

        $firstDate = \Carbon\Carbon::createFromFormat('Y-m-d\TH:i:s.u\Z', $session->firstDate)->format('d/m/Y');
        if($session->lastDate != null) {
            $lastDate = \Carbon\Carbon::createFromFormat('Y-m-d\TH:i:s.u\Z', $session->lastDate)->format('d/m/Y');
        }

        $title = 'Emargement ';
        $title .= $session->module->libelle;
        if($session->lastDate != null) {
            $title .= ' (' . $firstDate . ' - ' . $lastDate . ')';
        } else {
            $title .= ' (' . $firstDate . ')';
        }
        
        return $pdf->stream($title);
    }

    public function suiviSession(SessionRepositoryInterface $sessionRepository, $session_id) {
        $session = $sessionRepository->find($session_id);

        $pdf = PDF::loadView('print.suivi_session', [
            'session' => $session, 
            'nb_minutes' => $sessionRepository->getDuree($session),
            'formateurs' => $sessionRepository->getFormateurs($session),
            ]);

        $firstDate = \Carbon\Carbon::createFromFormat('Y-m-d\TH:i:s.u\Z', $session->firstDate)->format('d/m/Y');
        if($session->lastDate != null) {
            $lastDate = \Carbon\Carbon::createFromFormat('Y-m-d\TH:i:s.u\Z', $session->lastDate)->format('d/m/Y');
        }

        $title = 'Couverture ';
        $title .= $session->module->libelle;
        if($session->lastDate != null) {
            $title .= ' (' . $firstDate . ' - ' . $lastDate . ')';
        } else {
            $title .= ' (' . $firstDate . ')';
        }

        return $pdf->stream($title);
    }

    public function attestation(SessionRepositoryInterface $sessionRepository,
        InscriptionRepositoryInterface $inscriptionRepository, 
        ParametreRepositoryInterface $parametreRepository,
        $session_id) {
        
        $session = $sessionRepository->find($session_id, false);

        $inscriptions = $inscriptionRepository->findBy([
            'session_id' => $session_id, 
            'statut' => \ModuleFormation\Inscription::STATUS_VALIDATED
            ], false);

        $dureeFormation = 0;
        foreach($session->session_jours as $session_jour) {
            if($session_jour->heure_debut_matin != null && $session_jour->heure_fin_matin != null) {
                $dureeFormation += 3.5;
            }
            if($session_jour->heure_debut_apresmidi != null && $session_jour->heure_fin_apresmidi != null) {
                $dureeFormation += 3.5;
            }
        }

        $formateurs = array();
        foreach($session->session_jours as $session_jour) {
            foreach($session_jour->formateurs as $formateur) {
                $formateurs[$formateur->id] = $formateur;
            }
        }

        $pdf = PDF::loadView('print.attestation', [
            'session' => $session, 
            'inscriptions' => $inscriptions,
            'dureeFormation' => $dureeFormation,
            'formateurs' => $formateurs,
            'responsableFormation' => $parametreRepository->responsableFormation()
            ]);

        $firstDate = '';
        if($session->firstDate != null) {
            $firstDate = \Carbon\Carbon::createFromFormat('Y-m-d\TH:i:s.u\Z', $session->firstDate)->format('d/m/Y');
        }
        if($session->lastDate != null) {
            $lastDate = \Carbon\Carbon::createFromFormat('Y-m-d\TH:i:s.u\Z', $session->lastDate)->format('d/m/Y');
        }
        $title = 'Attestations ';
        $title .= $session->module->libelle;
        if($session->lastDate != null) {
            $title .= ' (' . $firstDate . ' - ' . $lastDate . ')';
        } else {
            $title .= ' (' . $firstDate . ')';
        }
        
        return $pdf->stream($title);
    }

    public function contrat($inscription_id, Request $request, PrintServiceInterface $printService) {

        $parameters = array_merge($printService->prepareContratParameters($inscription_id), $request->all());

        $pdf = PDF::loadView('print.contrat', $parameters);

        return $pdf->stream('title test');

    }

    public function dataExtraction() {
        return view('data_extraction');
    }

    public function parameterContrat(PrintServiceInterface $printService, $inscription_id) {
        $parameters = $printService->prepareContratParameters($inscription_id);

        return view('print.parameters.parameterContrat', $parameters);
    }
}