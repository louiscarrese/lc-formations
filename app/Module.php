<?php

namespace ModuleFormation;

class Module extends AbstractModel
{

    protected $with = ['domaine_formation', 'formateurs', 'lieu', 'tarifs'];

    protected $fillable = ['id', 'libelle', 'nb_jours', 'heure_debut_matin', 'heure_fin_matin', 'heure_debut_apresmidi', 'heure_fin_apresmidi', 
        'effectif_max', 'objectifs_pedagogiques', 'materiel', 'code_formation', 'lieu_id', 'domaine_formation_id'];

    public $searchable = ['libelle', 'objectifs_pedagogiques', 'materiel'];

    protected static $myTimes = ['heure_debut_matin', 'heure_fin_matin', 'heure_debut_apresmidi', 'heure_fin_apresmidi'];

    function sessions() {
        return $this->hasMany('ModuleFormation\Session');
    }

    function tarifs() {
        return $this->hasMany('ModuleFormation\Tarif');
    }

    function domaine_formation() {
        return $this->belongsTo('ModuleFormation\DomaineFormation');
    }

    function lieu() {
        return $this->belongsTo('ModuleFormation\Lieu');
    }

    function formateurs() {
        return $this->belongsToMany('ModuleFormation\Formateur')->withTimestamps();
    }
}
