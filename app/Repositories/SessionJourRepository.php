<?php 
namespace ModuleFormation\Repositories;

class SessionJourRepository extends AbstractRepository implements SessionJourRepositoryInterface
{
    protected $modelClassName = 'ModuleFormation\\SessionJour';

    private $formateurRepository;
    private $sessionRepository;

    function __construct($app, FormateurRepositoryInterface $formateurRepository, SessionRepositoryInterface $sessionRepository) {
        parent::__construct($app);
        $this->formateurRepository = $formateurRepository;
        $this->sessionRepository = $sessionRepository;

        $this->relations = [
            'formateurs' => [
                'data_id' => 'formateurs_id',
                'repository' => $this->formateurRepository,
                'relation_method' => 'formateurs'
            ]
        ];
    }

    public function createDefault($session_id, $date) 
    {
        //Get the session in db
        $session = $this->sessionRepository->find($session_id);
        //Extract informations for easier access
        $module = $session->module;
        $formateurs = $module->formateurs()->get();

        //We'll be working with a carbon date because it's easier to add days
        $carbonDate = \Carbon\Carbon::createFromFormat('Y-m-d\TH:i:s.u\Z', $date);

        //Iterate on the number of days we're going to create
        for($i = 0; $i < $module->nb_jours; $i++) {
            //Create the SessionJour
            $sessionJour = new \ModuleFormation\SessionJour();
            $sessionJour->session_id = $session_id;
            $sessionJour->date = $carbonDate->format('Y-m-d\TH:i:s.u\Z');
            $sessionJour->heure_debut = $module->heure_debut;
            $sessionJour->heure_fin = $module->heure_fin;
            $sessionJour->lieu_id = $module->lieu_id;
            $sessionJour->save();

            //Attach Formateurs
            foreach($formateurs as $formateur) {
                $sessionJour->formateurs()->save($formateur);
            }

            //Goto next day
            $carbonDate->addDay();
        }
    }

}