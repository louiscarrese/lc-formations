<?php

namespace ModuleFormation\Http\Controllers;
use Log;

use Illuminate\Http\Request;
use ModuleFormation\Http\Controllers\Controller;
use ModuleFormation\Repositories\ExtractionRepositoryInterface;
use ModuleFormation\Repositories\SessionRepositoryInterface;
use ModuleFormation\Repositories\InscriptionRepositoryInterface;
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
      $session = $sessionRepository->find($session_id, false);

        $parameters = $printService->prepareSuiviSessionParameters($session);

        $pdf = PDF::loadView('print.suivi_session', $parameters);

        $title = 'Couverture ' . $printService->getSessionLibelleForTitle($session);

        return $pdf->stream($title);
    }

    public function attestation(Request $request, SessionRepositoryInterface $sessionRepository, PrintServiceInterface $printService, $session_id) {
        
        $session = $sessionRepository->find($session_id, false);

        $parameters = array_merge($printService->prepareAttestationParameters($session), $request->all());

        $pdf = PDF::loadView('print.attestation', $parameters);

        $title = 'Attestations ' . $printService->getSessionLibelleForTitle($session);
        
        return $pdf->stream($title);
    }

    public function contrat($inscription_id, Request $request, PrintServiceInterface $printService, InscriptionRepositoryInterface $inscriptionRepository) {

        $inscription = $inscriptionRepository->find($inscription_id, false);

        $parameters = array_merge($printService->prepareContratParameters($inscription), $request->all());

        $pdf = PDF::loadView('print.contrat', $parameters);

        $title = 'Contrat ' . $printService->getLibelleForContrat($inscription);

        return $pdf->stream($title);

    }

    public function convention($inscription_id, Request $request, PrintServiceInterface $printService, InscriptionRepositoryInterface $inscriptionRepository) {

        $inscription = $inscriptionRepository->find($inscription_id, false);

        $parameters = array_merge($printService->prepareConventionParameters($inscription), $request->all());

        $pdf = PDF::loadView('print.convention', $parameters);

        $title = 'Convention ' . $printService->getLibelleForContrat($inscription);

        return $pdf->stream($title);

    }

    public function dataExtraction(Request $request, ExtractionRepositoryInterface $extractionRepository) {
	$min_date = $request->input("min_date") ? $request->input("min_date") : \Carbon\Carbon::now()->subYear()->startOfYear();
	$max_date = $request->input("max_date") ? $request->input("max_date") : \Carbon\Carbon::now()->subYear()->endOfYear();

	$data = array();
	$data['min_date'] = $min_date;
	$data['max_date'] = $max_date;
	$data['byDomaine'] = $extractionRepository->getByDomaineFormation($min_date, $max_date);
	$data['byModule'] = $extractionRepository->getByModule($min_date, $max_date);
	
        return view('data_extraction', $data);
    }

    public function parameterContrat(PrintServiceInterface $printService, InscriptionRepositoryInterface $inscriptionRepository, $inscription_id) {
        $inscription = $inscriptionRepository->find($inscription_id, false);

        $parameters = $printService->prepareContratParameters($inscription);

        return view('print.parameters.parameterContrat', $parameters);
    }

    public function parameterConvention(PrintServiceInterface $printService, InscriptionRepositoryInterface $inscriptionRepository,  $inscription_id) {
        $inscription = $inscriptionRepository->find($inscription_id, false);

        $parameters = $printService->prepareConventionParameters($inscription);

        return view('print.parameters.parameterConvention', $parameters);
    }

    public function parameterAttestation(PrintServiceInterface $printService, SessionRepositoryInterface $sessionRepository,  $session_id) {
        $session = $sessionRepository->find($session_id, false);

        $parameters = $printService->prepareAttestationParameters($session);

        return view('print.parameters.parameterAttestation', $parameters);
    }
}
