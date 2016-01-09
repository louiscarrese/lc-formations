<?php

namespace ModuleFormation;

class StagiaireType extends AbstractModel
{
    public function stagiaires() {
        return $this->hasMany('ModuleFormation\Stagiaire');
    }
}
