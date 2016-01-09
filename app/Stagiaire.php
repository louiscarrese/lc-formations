<?php

namespace ModuleFormation;

use ModuleFormation\AbstractModel;

class Stagiaire extends AbstractModel
{
    protected $with = ['stagiaire_type', 'employeur'];

    protected $fillable = ['id', 'nom', 'prenom', 'sexe', 'date_naissance', 'adresse', 
        'code_postal', 'ville', 'tel_portable', 'tel_fixe', 'email', 'profession', 'etudes', 
        'demandeur_emploi_depuis', 'niveau_qualification', 'domaine_pro', 'employeur_id', 'stagiaire_type_id'];

    protected static $myDates = ['demandeur_emploi_depuis', 'date_naissance'];

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

    function employeur() {
        return $this->belongsTo('ModuleFormation\Employeur');
    }

    function stagiaire_type() {
        return $this->belongsTo('ModuleFormation\StagiaireType');
    }

    function inscriptions() {
        return $this->hasMany('ModuleFormation\Inscription');
    }
}
