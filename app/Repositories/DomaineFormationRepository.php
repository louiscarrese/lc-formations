<?php 
namespace ModuleFormation\Repositories;

class DomaineFormationRepository extends AbstractRepository implements DomaineFormationRepositoryInterface
{
    protected $modelClassName = 'ModuleFormation\\DomaineFormation';

    protected function toModel($data, $seed = null) 
    {
        $domaineFormation = ($seed == null ? new \ModuleFormation\DomaineFormation : $seed);

        if(isset($data['id']))
            $domaineFormation->id = $data['id'];
        $domaineFormation->libelle = $data['libelle'];

        return $domaineFormation;
    }

}