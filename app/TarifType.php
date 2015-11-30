<?php

namespace ModuleFormation;

use Illuminate\Database\Eloquent\Model;

class TarifType extends Model
{

    public function tarifs() {
        return $this->hasMany('ModuleFormation\Tarif');
    }
}
