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
        $inscription->statut = 'validated';
        $inscription->save();
    }

    public function cancel($id)
    {
        $inscription = \ModuleFormation\Inscription::findOrFail($id);
        $inscription->statut = 'canceled';
        $inscription->save();
    }

    private function getStatutLibelle($statut) 
    {
        if($statut == 'pending') {
            return 'En cours';
        } else if($statut == 'validated') {
            return 'Validée';
        } else if($statut == 'canceled') {
            return 'Annulée';
        } else {
            return '';
        }
    }

}