<?php 
namespace ModuleFormation\Repositories;

class InscriptionRepository extends AbstractRepository implements InscriptionRepositoryInterface
{
    protected $modelClassName = 'ModuleFormation\\Inscription';

    private $sessionRepository;
    
    public function __construct($app, \ModuleFormation\Services\SessionRepositoryInterface $sessionRepository) 
    {
        parent::__construct($app);
        $this->sessionRepository = $sessionRepository;
    }

    protected function toModel($data, $seed = null) 
    {
        $inscription = ($seed == null ? new \ModuleFormation\Inscription : $seed);

        if(isset($data['id']))
            $inscription->id = $data['id'];
        $inscription->profession_structure = $data['profession_structure'];
        $inscription->experiences = $data['experiences'];
        $inscription->attentes = $data['attentes'];
        $inscription->suggestions = $data['suggestions'];
        $inscription->formations_precedentes = $data['formations_precedentes'];
        $inscription->stagiaire_id = $data['stagiaire_id'];
        $inscription->session_id = $data['session_id'];

        return $inscription;
    }

    protected function augmentData($data) 
    {
        $data->session = $this->sessionRepository->augmentData($data->session);

        return $data;
    }
}