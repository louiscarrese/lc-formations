<?php 
namespace ModuleFormation\Repositories;

use ModuleFormation\Inscription;

class SessionRepository extends AbstractRepository implements SessionRepositoryInterface
{
    protected $modelClassName = 'ModuleFormation\\Session';

    protected $defaultScope = "current";
    protected $isPaginated = true;
    
    private $sessionService;
    private $mailGeneratorService;

    public function __construct($app, 
        \ModuleFormation\Services\SessionServiceInterface $sessionService,
        \ModuleFormation\Services\MailGeneratorServiceInterface $mailGeneratorService) 
    {
        parent::__construct($app);
        $this->sessionService = $sessionService;
        $this->mailGeneratorService = $mailGeneratorService;
    }

    protected function augmentData($data) {
        //first and last dates
        $data = $this->fillFirstLastDate($data);
        
        //nb inscriptions
        $data = $this->fillNbInscriptions($data);

        //Mails
        $data = $this->fillMails($data);

        return $data;
    }

    public function afterUpdate($previousObject, $newObject) {
	//If the session has been canceled, cancel the inscriptions
	if($previousObject != null && $previousObject->canceled == 0 && $newObject->canceled == 1) {
	    foreach($newObject->inscriptions as $inscription) {
		if($inscription->statut == Inscription::STATUS_VALIDATED) {
		    $inscription->statut = Inscription::STATUS_CANCELED_SESSION;
		    $inscription->save();
		}
	    }
	}
	//If the session has been un-canceled, revalidate the inscriptions
	if($previousObject != null && $previousObject->canceled == 1 && $newObject->canceled == 0) {
	    foreach($newObject->inscriptions as $inscription) {
		if($inscription->statut == Inscription::STATUS_CANCELED_SESSION) {
		    $inscription->statut = Inscription::STATUS_VALIDATED;
		    $inscription->save();
		}
	    }
	}
    }

    protected function augmentListData($data) {
        $data = $this->fillFirstLastDate($data);
        $data = $this->fillNbInscriptions($data);
        return $data;
    }

    public function getDuree($session) {
        $total = 0;

        foreach($session->session_jours as $session_jour) {
            if($session_jour->heure_debut_matin && $session_jour->heure_fin_matin) {
                $heureDebutMatin = \Carbon\Carbon::createFromFormat('H:i', $session_jour->heure_debut_matin);
                $heureFinMatin = \Carbon\Carbon::createFromFormat('H:i', $session_jour->heure_fin_matin);
    
                $dureeMatin = $heureFinMatin->diffInMinutes($heureDebutMatin);
    
                $total += $dureeMatin;
            }

            if($session_jour->heure_debut_apresmidi && $session_jour->heure_fin_apresmidi) {
                $heureDebutApresmidi = \Carbon\Carbon::createFromFormat('H:i', $session_jour->heure_debut_apresmidi);
                $heureFinApresmidi = \Carbon\Carbon::createFromFormat('H:i', $session_jour->heure_fin_apresmidi);

                $dureeApresmidi = $heureFinApresmidi->diffInMinutes($heureDebutApresmidi);

                $total += $dureeApresmidi;
            }
        }

        return $total;
    }

    public function getFormateurs($session) {
        $formateursMap = [];
        foreach($session->session_jours as $session_jour) {
            foreach($session_jour->formateurs as $formateur) {
                if(!isset($formateursMap[$formateur->id]))
                    $formateursMap[$formateur->id] = $formateur;
            }
        }
        return array_values($formateursMap);
    }

    public function generateFormateursMail($session_id) {
        $session = $this->find($session_id);

        return $this->mailGeneratorService->infosStagiairesToFormateur($session);
    }

    public function upcoming() {
        //First get 5 distinct session_ids from the session_jours table where the date is in the future
        $session_jours = \ModuleFormation\SessionJour::where('date', '>', \Carbon\Carbon::now())
            ->orderBy('date')
            ->take(5)
            ->get();

        $sessions = $this->model()
            ->whereIn('id', $session_jours->pluck('session_id'))
            ->get();

        foreach($sessions as $data) {
            $data = $this->augmentData($data);
        }

        return ['data' => $sessions];
    }

    private function fillFirstLastDate($data) {
        $minMaxDate = $this->sessionService->getMinMaxDates($data->id);

        if($minMaxDate != null) {
            $data->firstDate = $minMaxDate['first'];
            $data->lastDate = $minMaxDate['last'];
        } 

        return $data;
    }

    private function fillNbInscriptions($data) {
        $counts = $this->sessionService->getNbInscriptionsByStatut($data->id);

        if(isset($counts[\ModuleFormation\Inscription::STATUS_PENDING]))
            $data->effectifPending = $counts[\ModuleFormation\Inscription::STATUS_PENDING];
        else 
            $data->effectifPending = 0;

        if(isset($counts[\ModuleFormation\Inscription::STATUS_VALIDATED]))
            $data->effectifValidated = $counts[\ModuleFormation\Inscription::STATUS_VALIDATED];
        else 
            $data->effectifValidated = 0;

	//Canceled(session) are counted as validated
        if(isset($counts[\ModuleFormation\Inscription::STATUS_CANCELED_SESSION]))
            $data->effectifValidated += $counts[\ModuleFormation\Inscription::STATUS_CANCELED_SESSION];

        if(isset($counts[\ModuleFormation\Inscription::STATUS_WAITING_LIST]))
            $data->effectifWaitingList = $counts[\ModuleFormation\Inscription::STATUS_WAITING_LIST];
        else 
            $data->effectifWaitingList = 0;

        $data->effectifTotal = $data->effectifPending + $data->effectifValidated + $data->effectifWaitingList;

        return $data;
    }

    private function fillMails($data) {
        $data->mailParticipants = $this->mailGeneratorService->participants($data);

        return $data;
    }
}
