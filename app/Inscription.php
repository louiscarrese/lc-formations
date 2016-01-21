<?php

namespace ModuleFormation;

class Inscription extends AbstractModel
{
    //Define status as constants
    const STATUS_PENDING = "pending";
    const STATUS_VALIDATED = "validated";
    const STATUS_CANCELED = "canceled";
    const STATUS_WITHDRAWN = "withdrawn";


    protected $with = ['stagiaire', 'session.module'];

    protected $fillable = ['id', 'profession_structure', 'experiences', 'attentes', 
        'suggestions', 'formations_precedentes', 'statut', 'stagiaire_id', 'session_id'];

    function stagiaire() {
        return $this->belongsTo('ModuleFormation\Stagiaire');
    }

    function session() {
        return $this->belongsTo('ModuleFormation\Session');
    }

    function financements() {
        return $this->hasMany('ModuleFormation\FinanceurInscription');
    }

    function financeurs() {
        return $this->hasManyThrough('ModuleFormation\Financeur', 'ModuleFormation\FinanceurInscription');
    }
}
