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
            $data->libelle = '(' . $minMaxDate['first'] . ' - ' . $minMaxDate['last'] . ')';
        } else {
            $data->libelle = '';
        }
        return $data;
    }
}