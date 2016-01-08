<?php 
namespace ModuleFormation\Repositories;

class StagiaireTypeRepository extends AbstractRepository implements StagiaireTypeRepositoryInterface
{
    protected $modelClassName = 'ModuleFormation\\StagiaireType';


    protected function toModel($data, $seed = null) 
    {
        $stagiaireType = ($seed == null ? new \ModuleFormation\StagiaireType : $seed);

        if(isset($data['id']))
            $stagiaireType->id = $data['id'];
        $stagiaireType->libelle = $data['libelle'];
        $stagiaireType->is_salarie = $data['is_salarie'];
        $stagiaireType->is_fonctionnaire = $data['is_fonctionnaire'];
        $stagiaireType->is_contrat_pro = $data['is_contrat_pro'];
        $stagiaireType->is_demandeur_emploi = $data['is_demandeur_emploi'];

        return $stagiaireType;
    }
}