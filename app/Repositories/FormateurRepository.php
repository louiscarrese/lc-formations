<?php 
namespace ModuleFormation\Repositories;

class FormateurRepository extends AbstractRepository implements FormateurRepositoryInterface
{
    protected $modelClassName = 'ModuleFormation\\Formateur';


    protected function toModel($data, $seed = null) 
    {
        $formateur = ($seed == null ? new \ModuleFormation\Formateur : $seed);

        if(isset($data['id']))
            $formateur->id = $data['id'];
        $formateur->nom = $data['nom'];
        $formateur->prenom = $data['prenom'];
        $formateur->sexe = $data['sexe'];
        $formateur->date_naissance = $data['date_naissance'];
        $formateur->adresse = $data['adresse'];
        $formateur->code_postal = $data['code_postal'];
        $formateur->ville = $data['ville'];
        $formateur->tel_portable = $data['tel_portable'];
        $formateur->tel_fixe = $data['tel_fixe'];
        $formateur->email = $data['email'];
        $formateur->formateur_type_id = $data['formateur_type_id'];

        return $formateur;
    }
}