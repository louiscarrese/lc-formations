<?php

namespace ModuleFormation;

use ModuleFormation\AbstractModel;

class Stagiaire extends AbstractModel
{
    protected $with = ['stagiaire_type', 'employeur', 'niveau_formation'];

    protected $fillable = ['id', 'nom', 'prenom', 'sexe', 'date_naissance', 'adresse', 
        'code_postal', 'ville', 'tel_portable', 'tel_fixe', 'email', 'profession', 'etudes', 
        'demandeur_emploi_depuis', 'niveau_qualification', 'domaine_pro', 'employeur_id', 
        'stagiaire_type_id', 'niveau_formation_id'];

    protected static $myDates = ['demandeur_emploi_depuis', 'date_naissance'];

    function employeur() {
        return $this->belongsTo('ModuleFormation\Employeur');
    }

    function stagiaire_type() {
        return $this->belongsTo('ModuleFormation\StagiaireType');
    }

    function niveau_formation() {
        return $this->belongsTo('ModuleFormation\NiveauFormation');
    }

    function inscriptions() {
        return $this->hasMany('ModuleFormation\Inscription');
    }
}
