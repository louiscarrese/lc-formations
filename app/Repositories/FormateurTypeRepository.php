<?php 
namespace ModuleFormation\Repositories;

class FormateurTypeRepository extends AbstractRepository implements FormateurTypeRepositoryInterface
{
    protected $modelClassName = 'ModuleFormation\\FormateurType';


    protected function toModel($data, $seed = null) 
    {
        $formateurType = ($seed == null ? new \ModuleFormation\FormateurType : $seed);

        if(isset($data['id']))
            $formateurType->id = $data['id'];
        $formateurType->libelle = $data['libelle'];

        return $formateurType;
    }
}