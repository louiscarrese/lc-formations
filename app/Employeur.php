<?php

namespace ModuleFormation;

class Employeur extends AbstractModel
{
    public function stagiaire() {
        return $this->hasMany('ModuleFormation\Stagiaire');
    }
}
