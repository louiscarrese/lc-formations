<?php 
namespace ModuleFormation\Repositories;

class PreinscriptionSessionRepository extends AbstractRepository implements PreinscriptionSessionRepositoryInterface
{
    protected $modelClassName = 'ModuleFormation\\PreinscriptionSession';

    private $sessionRepository;
    
    public function __construct($app, \ModuleFormation\Repositories\SessionRepositoryInterface $sessionRepository) 
    {
        parent::__construct($app);
        $this->sessionRepository = $sessionRepository;
    }


    protected function augmentData($data) {
        $data['financement_type'] = array('id' => $data->financement);
        $data->session = $this->sessionRepository->augmentData($data->session);

        return $data;
    }

    //TODO: A specific function ?
    protected function augmentListData($data) {
        $data = $this->augmentData($data);

        return $data;
    }

    protected function processIncomingData($data) {
        $data['financement'] = $data['financement_type']['id'];
        $data['session_id'] = $data['session']['id'];
        return $data;
    }
}