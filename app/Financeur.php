<?php

namespace ModuleFormation;

class Financeur extends AbstractModel
{

    protected $with = ['financeur_type'];

    function financeur_type() {
        return $this->belongsTo('ModuleFormation\FinanceurType');
    }

    function financements() {
        return $this->hasMany('ModuleFormation\FinanceurInscription');
    }

    function inscriptions() {
        return $this->hasManyThrough('ModuleFormation\Inscription', 'ModuleFormation\FinanceurInscription');
    }

}
