<?php

namespace ModuleFormation;

class Formateur extends AbstractModel
{

    protected $with = ['formateur_type'];

    protected static $myDates = ['date_naissance'];

    public function session_jours() {
        return $this->belongsToMany('ModuleFormation\SessionJour')->withTimestamps();
    }

    public function modules() {
        return $this->hasMany('ModuleFormation\Module');
    }

    public function formateur_type() {
        return $this->belongsTo('ModuleFormation\FormateurType');
    }

    //Un peu périlleux, pas dit que ça marche
    public function sessions() {
        return $this->hasManyThrough('ModuleFormation\Session', 'ModuleFormation\SessionJour');
    }
}
