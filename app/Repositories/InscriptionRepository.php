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

        $data->statut_libelle = $this->getStatutLibelle($data->statut);

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
        } else {
            return '';
        }
    }

}