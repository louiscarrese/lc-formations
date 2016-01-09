<?php

namespace ModuleFormation;

class SessionJour extends AbstractModel
{
    protected $with = ['lieu', 'formateurs'];

    protected $fillable = ['id', 'date', 'heure_debut', 'heure_fin', 'lieu_id', 'session_id'];

    protected static $myDates = ['date'];
    protected static $myTimes = ['heure_debut', 'heure_fin'];

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
