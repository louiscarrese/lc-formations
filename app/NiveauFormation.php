<?php

namespace ModuleFormation;

class NiveauFormation extends AbstractModel
{
    protected $fillable = ['libelle'];
//
    function stagiaires() {
        return $this->hasMany('ModuleFormation\Stagiaire');
    }
}
