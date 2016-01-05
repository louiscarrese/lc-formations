<?php

namespace ModuleFormation;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Stagiaire extends Model
{

    function employeur() {
        return $this->belongsTo('ModuleFormation\Employeur');
    }

    function stagiaire_type() {
        return $this->belongsTo('ModuleFormation\StagiaireType');
    }

    function inscriptions() {
        return $this->hasMany('ModuleFormation\Inscription');
    }

    public function setDemandeurEmploiDepuisAttribute($dateIn) {
        $this->attributes['demandeur_emploi_depuis'] = Carbon::createFromFormat('d/m/Y', $dateIn);
    }

}
