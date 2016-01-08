<?php 
namespace ModuleFormation\Repositories;

class EmployeurRepository extends AbstractRepository implements EmployeurRepositoryInterface
{
    protected $modelClassName = 'ModuleFormation\\Employeur';


    protected function toModel($data, $seed = null) 
    {
        $employeur = ($seed == null ? new \ModuleFormation\Employeur : $seed);

        if(isset($data['id']))
            $employeur->id = $data['id'];
        $employeur->nom = $data['nom'];
        $employeur->raison_sociale = $data['raison_sociale'];
        $employeur->adresse = $data['adresse'];
        $employeur->code_postal = $data['code_postal'];
        $employeur->ville = $data['ville'];
        $employeur->telephone = $data['telephone'];
        $employeur->email = $data['email'];
        $employeur->contact = $data['contact'];

        return $employeur;
    }
}