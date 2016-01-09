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

    protected function augmentData($data) 
    {
        $data->session = $this->sessionRepository->augmentData($data->session);

        return $data;
    }
}