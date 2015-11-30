<?php

namespace ModuleFormation;

use Illuminate\Database\Eloquent\Model;

class Formateur extends Model
{

    public function session_jours() {
        return $this->hasMany('ModuleFormation\SessionJour');
    }

    public function modules() {
        return $this->hasMany('ModuleFormation\Module');
    }


    //Un peu périlleux, pas dit que ça marche
    public function sessions() {
        return $this->hasManyThrough('ModuleFormation\Session', 'ModuleFormation\SessionJour');
    }
}
