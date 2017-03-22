<?php

namespace ModuleFormation\Services;

use ModuleFormation\Formateur;

class FormateurService implements FormateurServiceInterface
{
    private $mailGeneratorService;
    
    public function __construct(
	MailGeneratorServiceInterface $mailGeneratorService) 
    {
        $this->mailGeneratorService = $mailGeneratorService;
    }


    public function mailFormateursActifs()
    {
	$formateurs = $this->actifs();
	
	return $this->mailGeneratorService->formateursActifs($formateurs);
    }
    
    protected function actifs()
    {
	$formateurs = Formateur::whereHas('session_jours', function ($q) {
	    $q->whereHas('session', function($qu) {
		$qu->current();
	    });
	})->get()->all();

	return $formateurs;
	
    }
}
