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
        $minMaxDate = $this->sessionService->getMinMaxDates($data->id);

        if($minMaxDate != null) {
            $data->firstDate = $minMaxDate['first'];
            $data->lastDate = $minMaxDate['last'];
        } 
        
        //nb inscriptions
        $data->effectifPending = $this->sessionService->getNbInscriptions($data->id, \ModuleFormation\Inscription::STATUS_PENDING);
        $data->effectifValidated = $this->sessionService->getNbInscriptions($data->id, \ModuleFormation\Inscription::STATUS_VALIDATED);
        $data->effectifWaitingList = $this->sessionService->getNbInscriptions($data->id, \ModuleFormation\Inscription::STATUS_WAITING_LIST);
        $data->effectifTotal = $data->effectifPending + $data->effectifValidated + $data->effectifWaitingList;

        //Mails
        $data->mailParticipants = $this->mailGeneratorService->participants($data);

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
}