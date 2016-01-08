<?php

namespace ModuleFormation;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{

    protected $with = ['module'];

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
