<?php

namespace ModuleFormation\Http\Controllers;
use Log;

use Illuminate\Http\Request;
use ModuleFormation\Http\Requests;
use ModuleFormation\Http\Controllers\Controller;
use ModuleFormation\Repositories\SessionRepositoryInterface;
use ModuleFormation\Repositories\InscriptionRepositoryInterface;
use PDF;


class PrintController extends Controller
{

    public function emargement(SessionRepositoryInterface $sessionRepository, 
        InscriptionRepositoryInterface $inscriptionRepository, 
        $session_id) {
        $session = $sessionRepository->find($session_id);
        $inscriptions = $inscriptionRepository->findBy(['session_id' => $session_id]);


        $pdf = PDF::loadView('print.emargement', [
            'session' => $session, 
            'inscriptions' => $inscriptions
            ]);

        $firstDate = \Carbon\Carbon::createFromFormat('Y-m-d\TH:i:s.u\Z', $session->firstDate)->format('d/m/Y');
        $lastDate = \Carbon\Carbon::createFromFormat('Y-m-d\TH:i:s.u\Z', $session->lastDate)->format('d/m/Y');

        $title = 'Emargement ';
        $title .= $session->module->libelle;
        $title .= ' (' . $firstDate . ' - ' . $lastDate . ')';
        return $pdf->stream($title);
    }
}