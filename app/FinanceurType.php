<?php

namespace ModuleFormation;

use Illuminate\Database\Eloquent\Model;

class FinanceurType extends Model
{
    //
    function financeurs() {
        return $this->hasMany('ModuleFormation\Financeur');
    }
}
