<?php 
namespace ModuleFormation\Repositories;

class SessionRepository extends AbstractRepository implements SessionRepositoryInterface
{
    protected $modelClassName = 'ModuleFormation\\Session';

    private $sessionService;

    public function __construct($app, \ModuleFormation\Services\SessionServiceInterface $sessionService) 
    {
        parent::__construct($app);
        $this->sessionService = $sessionService;
    }

    protected function augmentData($data) {
        $minMaxDate = $this->sessionService->getMinMaxDates($data->id);

        if($minMaxDate != null) {
            $data->firstDate = $minMaxDate['first'];
            $data->lastDate = $minMaxDate['last'];
        } 
        
        return $data;
    }
}