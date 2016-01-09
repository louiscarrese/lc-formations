<?php

namespace ModuleFormation;

class SessionJour extends AbstractModel
{
    protected $with = ['lieu', 'formateurs'];

    protected static $myDates = ['date'];

    public function session() {
        return $this->belongsTo('ModuleFormation\Session');
    }

    public function formateurs() {
        return $this->belongsToMany('ModuleFormation\Formateur')->withTimestamps();
    }

    public function lieu() {
        return $this->belongsTo('ModuleFormation\Lieu');
    }
}
