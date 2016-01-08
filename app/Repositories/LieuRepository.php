<?php 
namespace ModuleFormation\Repositories;

class LieuRepository extends AbstractRepository implements LieuRepositoryInterface
{
    protected $modelClassName = 'ModuleFormation\\Lieu';


    protected function toModel($data, $seed = null) 
    {
        $lieu = ($seed == null ? new \ModuleFormation\Lieu : $seed);

        if(isset($data['id']))
            $lieu->id = $data['id'];
        $lieu->libelle = $data['libelle'];

        return $lieu;
    }
}