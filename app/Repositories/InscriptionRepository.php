<?php 
namespace ModuleFormation\Repositories;

class InscriptionRepository extends AbstractRepository implements InscriptionRepositoryInterface
{
    protected $modelClassName = 'ModuleFormation\\Inscription';

    protected $defaultScope = "current";
    protected $isPaginated = true;

    private $sessionRepository;
    private $tarifRepository;
    
    public function __construct($app, 
        \ModuleFormation\Repositories\SessionRepositoryInterface $sessionRepository,
        \ModuleFormation\Repositories\TarifRepositoryInterface $tarifRepository) 
    {
        parent::__construct($app);

        $this->sessionRepository = $sessionRepository;
        $this->tarifRepository = $tarifRepository;

        $this->subObjects = [
            [
                'data_id' => 'session',
                'repository' => $this->sessionRepository,
                'parent_key' => 'session_id',
            ]
        ];
    }

    protected function augmentData($data) 
    {
        $data = parent::augmentData($data);

        $data = $this->fillStatut($data);

        $data->available_tarifs = $this->getAvailableTarifs($data);

        return $data;
    }

    protected function augmentListData($data) {
        $data = parent::augmentListData($data);

        $data = $this->fillStatut($data);

	if($data->stagiaire->tel_portable != null) {
	    $data->stagiaire->telephone = $data->stagiaire->tel_portable;
	} else if($data->stagiaire->tel_fixe != null) {
	    $data->stagiaire->telephone = $data->stagiaire->tel_fixe;
	} else {
	    $data->stagiaire->telephone = "";
	}

        return $data;
    }

    protected function processIncomingData($data) {
        $statut_id = $data['statut']['id'];

        $data['statut'] = $statut_id;

        return $data;
    }

    private function getAvailableTarifs($data) {
        if($data->session)
            return $this->tarifRepository->findBy(['module_id' => $data->session->module_id])['data'];
        else 
            return null;
    }

    private function fillStatut($data) {
        $statut_id = $data->statut;
        $statut_libelle = $this->getStatutLibelle($data->statut);
        $data->statut = array('id' => $statut_id, 'libelle' => $statut_libelle);

        return $data;
    }

    public function validate($id)
    {
        $inscription = \ModuleFormation\Inscription::findOrFail($id);
        $inscription->statut = \ModuleFormation\Inscription::STATUS_VALIDATED;
        $inscription->save();
    }

    public function cancel($id)
    {
        $inscription = \ModuleFormation\Inscription::findOrFail($id);
        $inscription->statut = \ModuleFormation\Inscription::STATUS_CANCELED;
        $inscription->save();
    }

    public function withdraw($id)
    {
        $inscription = \ModuleFormation\Inscription::findOrFail($id);
        $inscription->statut = \ModuleFormation\Inscription::STATUS_WITHDRAWN;
        $inscription->save();
    }

    private function getStatutLibelle($statut) 
    {
        if($statut == \ModuleFormation\Inscription::STATUS_PENDING) {
            return 'En cours';
        } else if($statut == \ModuleFormation\Inscription::STATUS_VALIDATED) {
            return 'Validée';
        } else if($statut == \ModuleFormation\Inscription::STATUS_CANCELED) {
            return 'Annulée';
        } else if($statut == \ModuleFormation\Inscription::STATUS_CANCELED_SESSION) {
            return 'Annulée (session)';
        } else if($statut == \ModuleFormation\Inscription::STATUS_WITHDRAWN) {
            return 'Désistée';
        } else if($statut == \ModuleFormation\Inscription::STATUS_WAITING_LIST) {
            return 'Liste d\'attente';
        } else {
            return '';
        }
    }

}
