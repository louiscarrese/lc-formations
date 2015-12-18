<?php

namespace ModuleFormation;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class SessionJour extends Model
{
    public function session() {
        return $this->belongsTo('ModuleFormation\Session');
    }

    public function formateurs() {
        return $this->belongsToMany('ModuleFormation\Formateur')->withTimestamps();
    }

    public function lieu() {
        return $this->belongsTo('ModuleFormation\Lieu');
    }

    public function setDateAttribute($dateIn) {
        $this->attributes['date'] = Carbon::createFromFormat('d/m/Y', $dateIn);
    }

}
