<?php

namespace ModuleFormation;

use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{

    public function module() {
        return $this->belongsTo('ModuleFormation\Module');
    }

    public function tarif_type() {
        return $this->belongsTo('ModuleFormation\TarifType');
    }
}
