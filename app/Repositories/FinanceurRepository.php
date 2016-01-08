<?php 
namespace ModuleFormation\Repositories;

class FinanceurRepository extends AbstractRepository implements FinanceurRepositoryInterface
{
    protected $modelClassName = 'ModuleFormation\\Financeur';


    protected function toModel($data, $seed = null) 
    {
        $financeur = ($seed == null ? new \ModuleFormation\Financeur : $seed);

        if(isset($data['id']))
            $financeur->id = $data['id'];
        $financeur->libelle = $data['libelle'];
        $financeur->structure = $data['structure'];
        $financeur->nom = $data['nom'];
        $financeur->prenom = $data['prenom'];
        $financeur->adresse = $data['adresse'];
        $financeur->code_postal = $data['code_postal'];
        $financeur->ville = $data['ville'];
        $financeur->tel = $data['tel'];
        $financeur->email = $data['email'];
        $financeur->financeur_type_id = $data['financeur_type_id'];

        return $financeur;
    }
}