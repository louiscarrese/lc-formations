<?php

namespace ModuleFormation;

class Session extends AbstractModel
{

    protected $with = ['module'];

    protected $fillable = ['id', 'nb_jours', 'effectif_max', 'objectifs_pedagogiques', 'materiel', 'module_id'];

    public function module() {
        return $this->belongsTo('ModuleFormation\Module');
    }

    public function session_jours() {
        return $this->hasMany('ModuleFormation\SessionJour');
    }

    public function inscriptions() {
        return $this->hasMany('ModuleFormation\Inscription');
    }

}
