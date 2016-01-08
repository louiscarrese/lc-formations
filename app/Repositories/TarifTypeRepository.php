<?php 
namespace ModuleFormation\Repositories;

class TarifTypeRepository extends AbstractRepository implements TarifTypeRepositoryInterface
{
    protected $modelClassName = 'ModuleFormation\\TarifType';


    protected function toModel($data, $seed = null) 
    {
        $tarifType = ($seed == null ? new \ModuleFormation\TarifType : $seed);

        if(isset($data['id']))
            $tarifType->id = $data['id'];
        $tarifType->libelle = $data['libelle'];

        return $tarifType;
    }
}