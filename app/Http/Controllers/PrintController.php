<?php

namespace ModuleFormation\Http\Controllers;
use Log;

use Illuminate\Http\Request;
use ModuleFormation\Http\Controllers\Controller;
use ModuleFormation\Repositories\SessionRepositoryInterface;
use ModuleFormation\Services\PrintServiceInterface;
use PDF;


class PrintController extends Controller
{

    public function emargement(SessionRepositoryInterface $sessionRepository, PrintServiceInterface $printService, $session_id) {
        $session = $sessionRepository->find($session_id, false);

        $parameters = $printService->prepareEmargementParameters($session);

        $pdf = PDF::loadView('print.emargement', $parameters);

        $title = 'Emargement ' . $printService->getSessionLibelleForTitle($session);

        return $pdf->stream($title);
    }

    public function suiviSession(SessionRepositoryInterface $sessionRepository, PrintServiceInterface $printService, $session_id) {
        $session = $sessionRepository->find($session_id);

        $parameters = $printService->prepareSuiviSessionParameters($session);

        $pdf = PDF::loadView('print.suivi_session', $parameters);

        $title = 'Couverture ' . $printService->getSessionLibelleForTitle($session);

        return $pdf->stream($title);
    }

    public function attestation(SessionRepositoryInterface $sessionRepository, PrintServiceInterface $printService, $session_id) {
        
        $session = $sessionRepository->find($session_id, false);

        $parameters = $printService->prepapreAttestationParameters($session);

        $pdf = PDF::loadView('print.attestation', $parameters);

        $title = 'Attestations ' . $printService->getSessionLibelleForTitle($session);
        
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