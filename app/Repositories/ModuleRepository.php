<?php 
namespace ModuleFormation\Repositories;

class ModuleRepository extends AbstractRepository implements ModuleRepositoryInterface
{
    protected $modelClassName = 'ModuleFormation\\Module';

    function __construct($app, FormateurRepositoryInterface $formateurRepository) {
        parent::__construct($app);
        $this->formateurRepository = $formateurRepository;
    }

    protected function toModel($data, $seed = null) 
    {
        $module = ($seed == null ? new \ModuleFormation\Module : $seed);

        if(isset($data['id']))
            $module->id = $data['id'];
        $module->libelle = $data['libelle'];
        $module->nb_jours = $data['nb_jours'];
        $module->heure_debut = $data['heure_debut'];
        $module->heure_fin = $data['heure_fin'];
        $module->effectif_max = $data['effectif_max'];
        $module->objectifs_pedagogiques = $data['objectifs_pedagogiques'];
        $module->materiel = $data['materiel'];
        $module->domaine_formation_id = $data['domaine_formation_id'];

        $module->formateurs()->detach();
        if(isset($data['formateurs_id']) && count($data['formateurs_id']) > 0) {
            foreach($data['formateurs_id'] as $formateur_id) {
                $formateur = $this->formateurRepository->find($formateur_id);
                $module->formateurs()->save($formateur);
            }
        }

        return $module;
    }
}