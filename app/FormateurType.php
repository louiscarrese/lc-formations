<?php

namespace ModuleFormation;

use Illuminate\Database\Eloquent\Model;

class FormateurType extends Model
{
    public function formateurs() {
        return $this->hasMany('ModuleFormation\Formateur');
    }
}
