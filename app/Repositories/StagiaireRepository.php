<?php 
namespace ModuleFormation\Repositories;

class StagiaireRepository extends AbstractRepository implements StagiaireRepositoryInterface
{
    protected $modelClassName = 'ModuleFormation\\Stagiaire';


    protected function toModel($data, $seed = null) 
    {
        $stagiaire = ($seed == null ? new \ModuleFormation\Stagiaire : $seed);

        if(isset($data['id']))
            $stagiaire->id = $data['id'];
        $stagiaire->nom = $data['nom'];
        $stagiaire->prenom = $data['prenom'];
        $stagiaire->sexe = $data['sexe'];
        $stagiaire->date_naissance = $data['date_naissance'];
        $stagiaire->adresse = $data['adresse'];
        $stagiaire->code_postal = $data['code_postal'];
        $stagiaire->ville = $data['ville'];
        $stagiaire->tel_portable = $data['tel_portable'];
        $stagiaire->tel_fixe = $data['tel_fixe'];
        $stagiaire->email = $data['email'];
        $stagiaire->profession = $data['profession'];
        $stagiaire->etudes = $data['etudes'];
        $stagiaire->demandeur_emploi_depuis = $data['demandeur_emploi_depuis'];
        $stagiaire->niveau_qualification = $data['niveau_qualification'];
        $stagiaire->domaine_pro = $data['domaine_pro'];

        $stagiaire->employeur_id = $data['employeur_id'];
        $stagiaire->stagiaire_type_id = $data['stagiaire_type_id'];

        return $stagiaire;
    }
}