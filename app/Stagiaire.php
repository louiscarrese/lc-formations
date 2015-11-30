<?php

namespace ModuleFormation;

use Illuminate\Database\Eloquent\Model;

class Stagiaire extends Model
{

    function employeur() {
        return $this->belongsTo('ModuleFormation\Employeur');
    }

    function type() {
        return $this->belongsTo('ModuleFormation\StagiaireType');
    }

    function inscriptions() {
        return $this->hasMany('ModuleFormation\Inscription');
    }
}
