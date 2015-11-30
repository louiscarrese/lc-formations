<?php

namespace ModuleFormation;

use Illuminate\Database\Eloquent\Model;

class DomaineFormation extends Model
{

    public function modules() {
        return $this->hasMany('ModuleFormation\Module');
    }
}
