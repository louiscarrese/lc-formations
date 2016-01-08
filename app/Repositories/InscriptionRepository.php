<?php 
namespace ModuleFormation\Repositories;

class InscriptionRepository extends AbstractRepository implements InscriptionRepositoryInterface
{
    protected $modelClassName = 'ModuleFormation\\Inscription';

    private $sessionService;
    
    public function __construct($app, \ModuleFormation\Services\SessionServiceInterface $sessionService) 
    {
        parent::__construct($app);
        $this->sessionService = $sessionService;
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
        $minMaxDate = $this->sessionService->getMinMaxDates($data->id);

        $data->session->libelle = '(' . $minMaxDate['first'] . ' - ' . $minMaxDate['last'] . ')';

        return $data;
    }
}