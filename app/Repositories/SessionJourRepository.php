<?php 
namespace ModuleFormation\Repositories;

class SessionJourRepository extends AbstractRepository implements SessionJourRepositoryInterface
{
    protected $modelClassName = 'ModuleFormation\\SessionJour';

    private $formateurRepository;

    function __construct($app, FormateurRepositoryInterface $formateurRepository) {
        parent::__construct($app);
        $this->formateurRepository = $formateurRepository;
    }

    protected function toModel($data, $seed = null) 
    {
        $sessionJour = ($seed == null ? new \ModuleFormation\SessionJour : $seed);

        if(isset($data['id']))
            $sessionJour->id = $data['id'];
        $sessionJour->date = $data['date'];
        $sessionJour->heure_debut = $data['heure_debut'];
        $sessionJour->heure_fin = $data['heure_fin'];
        $sessionJour->lieu_id = $data['lieu_id'];
        $sessionJour->session_id = $data['session_id'];

        $sessionJour->formateurs()->detach();
        if(isset($data['formateurs_id']) && count($data['formateurs_id']) > 0) {
            foreach($data['formateurs_id'] as $formateur_id) {
                $formateur = $this->formateurRepository->find($formateur_id);
                $sessionJour->formateurs()->save($formateur);
            }
        }
        return $sessionJour;
    }
}