<?php

namespace ModuleFormation;

use Illuminate\Database\Eloquent\Model;

class Employeur extends Model
{
    public function stagiaire() {
        return $this->hasMany('ModuleFormation\Stagiaire');
    }
}
