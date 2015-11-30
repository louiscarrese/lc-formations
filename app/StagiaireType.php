<?php

namespace ModuleFormation;

use Illuminate\Database\Eloquent\Model;

class StagiaireType extends Model
{
    public function stagiaires() {
        return $this->hasMany('ModuleFormation\Stagiaire');
    }
}
