<?php

namespace ModuleFormation\Http\Controllers;
use Log;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
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

    public function allContrats($session_id, Request $request, PrintServiceInterface $printService, InscriptionRepositoryInterface $inscriptionRepository) {
	$inscriptions = $inscriptionRepository->findBy(['session_id' => $session_id, 'statut' => 'validated'])['data'];

	$parameters['inscriptions'] = array();
	foreach($inscriptions as $inscription) {
	    $parameters['inscriptions'][$inscription->id] = array_merge($printService->prepareContratParameters($inscription), $request->all());
	}

	$pdf = PDF::loadView('print.all-contrats', $parameters);
	$title = 'Tous les contrats';

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
	$min_date = \Carbon\Carbon::now()->subYear()->startOfYear();
	if($request->input("min_date"))
	    $min_date = \Carbon\Carbon::createFromFormat('Y-m-d', $request->input("min_date"));

	$max_date = \Carbon\Carbon::now()->subYear()->endOfYear();
	if($request->input("max_date"))
	    $max_date = \Carbon\Carbon::createFromFormat('Y-m-d', $request->input("max_date"));

	$data = array();
	$data['min_date'] = $min_date;
	$data['max_date'] = $max_date;
	$data['byDomaine'] = $extractionRepository->getByDomaineFormation($min_date, $max_date);
	$data['byModule'] = $extractionRepository->getByModule($min_date, $max_date);
	
        return view('data_extraction', $data);
    }

    public function csvInscriptions(Request $request, ExtractionRepositoryInterface $extractionRepository) {
	$min_date = \Carbon\Carbon::now()->subYear()->startOfYear();
	if($request->input("min_date"))
	    $min_date = \Carbon\Carbon::createFromFormat('Y-m-d', $request->input("min_date"));

	$max_date = \Carbon\Carbon::now()->subYear()->endOfYear();
	if($request->input("max_date"))
	    $max_date = \Carbon\Carbon::createFromFormat('Y-m-d', $request->input("max_date"));

	$data = $extractionRepository->csvInscription($min_date, $max_date);
	return $this->outputCsv("parInscription.csv", $data);

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

    //https://stackoverflow.com/questions/32441327
    private function outputCsv($filename, $data) {
	$headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=" . $filename,
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
	);

	$callback = function() use ($data) {
	    $file = fopen('php://output', 'w');
	    foreach($data as $line) {
		fputcsv($file, $line);
	    }
	    fclose($file);
	};

	return Response::stream($callback, 200, $headers);
    }
}
