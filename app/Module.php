<?php

namespace ModuleFormation;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{

    function sessions() {
        return $this->hasMany('ModuleFormation\Session');
    }

    function tarifs() {
        return $this->hasMany('ModuleFormation\Tarif');
    }

    function domaine_formation() {
        return $this->belongsTo('ModuleFormation\DomaineFormation');
    }

    function formateurs() {
        return $this->belongsToMany('ModuleFormation\Formateur')->withTimestamps();
    }
}
