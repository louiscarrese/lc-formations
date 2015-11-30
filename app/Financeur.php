<?php

namespace ModuleFormation;

use Illuminate\Database\Eloquent\Model;

class Financeur extends Model
{

    function type() {
        return $this->belongsTo('ModuleFormation\FinanceurType');
    }

    function financements() {
        return $this->hasMany('ModuleFormation\FinanceurInscription');
    }

    function inscriptions() {
        return $this->hasManyThrough('ModuleFormation\Inscription', 'ModuleFormation\FinanceurInscription');
    }

}
