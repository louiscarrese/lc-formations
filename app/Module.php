<?php

namespace ModuleFormation;

class Module extends AbstractModel
{

    protected $with = ['domaine_formation', 'formateurs'];

    protected $fillable = ['id', 'libelle', 'nb_jours', 'heure_debut', 'heure_fin', 
        'effectif_max', 'objectifs_pedagogiques', 'materiel', 'domaine_formation_id'];

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
