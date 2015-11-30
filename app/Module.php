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

    function domaine() {
        return $this->belongsTo('ModuleFormation\DomaineFormation');
    }


}
