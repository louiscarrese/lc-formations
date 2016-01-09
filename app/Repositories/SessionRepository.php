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

    protected function toModel($data, $seed = null) 
    {
        $session = ($seed == null ? new \ModuleFormation\Session : $seed);

        if(isset($data['id']))
            $session->id = $data['id'];
        $session->nb_jours = $data['nb_jours'];
        $session->effectif_max = $data['effectif_max'];
        $session->objectifs_pedagogiques = $data['objectifs_pedagogiques'];
        $session->materiel = $data['materiel'];
        $session->module_id = $data['module_id'];

        return $session;
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