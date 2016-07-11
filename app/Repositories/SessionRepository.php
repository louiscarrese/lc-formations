<?php 
namespace ModuleFormation\Repositories;

class SessionRepository extends AbstractRepository implements SessionRepositoryInterface
{
    protected $modelClassName = 'ModuleFormation\\Session';

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