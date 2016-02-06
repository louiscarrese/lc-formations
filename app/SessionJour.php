<?php

namespace ModuleFormation;

class SessionJour extends AbstractModel
{
    protected $with = ['lieu', 'formateurs'];

    protected $fillable = ['id', 'date', 'heure_debut_matin', 'heure_fin_matin', 'heure_debut_apresmidi', 'heure_fin_apresmidi', 'lieu_id', 'session_id'];

    protected static $myDates = ['date'];
    protected static $myTimes = ['heure_debut_matin', 'heure_fin_matin', 'heure_debut_apresmidi', 'heure_fin_apresmidi'];

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
