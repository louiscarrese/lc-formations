<?php

namespace ModuleFormation;

use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    protected $with = ['tarif_type'];

    public function module() {
        return $this->belongsTo('ModuleFormation\Module');
    }

    public function tarif_type() {
        return $this->belongsTo('ModuleFormation\TarifType');
    }
}
