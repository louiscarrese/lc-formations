<?php

namespace ModuleFormation;

use ModuleFormation\AbstractModel;

class Stagiaire extends AbstractModel
{
    protected $with = ['stagiaire_type', 'employeur'];

    protected static $myDates = ['demandeur_emploi_depuis', 'date_naissance'];

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
