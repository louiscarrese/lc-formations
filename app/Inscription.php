<?php

namespace ModuleFormation;

class Inscription extends AbstractModel
{
    protected $with = ['stagiaire', 'session.module'];

    function stagiaire() {
        return $this->belongsTo('ModuleFormation\Stagiaire');
    }

    function session() {
        return $this->belongsTo('ModuleFormation\Session');
    }

    function financements() {
        return $this->hasMany('ModuleFormation\FinanceurInscription');
    }

    function financeurs() {
        return $this->hasManyThrough('ModuleFormation\Financeur', 'ModuleFormation\FinanceurInscription');
    }
}
