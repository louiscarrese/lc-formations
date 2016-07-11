<?php 
namespace ModuleFormation\Repositories;

class InscriptionRepository extends AbstractRepository implements InscriptionRepositoryInterface
{
    protected $modelClassName = 'ModuleFormation\\Inscription';

    private $sessionRepository;
    
    public function __construct($app, \ModuleFormation\Repositories\SessionRepositoryInterface $sessionRepository) 
    {
        parent::__construct($app);
        $this->sessionRepository = $sessionRepository;
    }

    protected function augmentData($data) 
    {
        $data->session = $this->sessionRepository->augmentData($data->session);

        $data = $this->fillStatut($data);

        return $data;
    }

    protected function augmentListData($data) {
        $data->session = $this->sessionRepository->augmentListData($data->session);
        
        $data = $this->fillStatut($data);

        return $data;
    }

    protected function processIncomingData($data) {
        $statut_id = $data['statut']['id'];

        $data['statut'] = $statut_id;

        return $data;
    }

    private function fillStatut($data) {
        $statut_id = $data->statut;
        $statut_libelle = $this->getStatutLibelle($data->statut);
        $data->statut = array('id' => $statut_id, 'libelle' => $statut_libelle);

        return $data;
    }

    public function validate($id)
    {
        $inscription = \ModuleFormation\Inscription::findOrFail($id);
        $inscription->statut = \ModuleFormation\Inscription::STATUS_VALIDATED;
        $inscription->save();
    }

    public function cancel($id)
    {
        $inscription = \ModuleFormation\Inscription::findOrFail($id);
        $inscription->statut = \ModuleFormation\Inscription::STATUS_CANCELED;
        $inscription->save();
    }

    public function withdraw($id)
    {
        $inscription = \ModuleFormation\Inscription::findOrFail($id);
        $inscription->statut = \ModuleFormation\Inscription::STATUS_WITHDRAWN;
        $inscription->save();
    }

    private function getStatutLibelle($statut) 
    {
        if($statut == \ModuleFormation\Inscription::STATUS_PENDING) {
            return 'En cours';
        } else if($statut == \ModuleFormation\Inscription::STATUS_VALIDATED) {
            return 'Validée';
        } else if($statut == \ModuleFormation\Inscription::STATUS_CANCELED) {
            return 'Annulée';
        } else if($statut == \ModuleFormation\Inscription::STATUS_WITHDRAWN) {
            return 'Désistée';
        } else if($statut == \ModuleFormation\Inscription::STATUS_WAITING_LIST) {
            return 'Liste d\'attente';
        } else {
            return '';
        }
    }

}