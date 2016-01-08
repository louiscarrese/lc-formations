<?php 
namespace ModuleFormation\Repositories;

class FinanceurTypeRepository extends AbstractRepository implements FinanceurTypeRepositoryInterface
{
    protected $modelClassName = 'ModuleFormation\\FinanceurType';


    protected function toModel($data, $seed = null) 
    {
        $financeurType = ($seed == null ? new \ModuleFormation\FinanceurType : $seed);

        if(isset($data['id']))
            $financeurType->id = $data['id'];
        $financeurType->libelle = $data['libelle'];

        return $financeurType;
    }
}