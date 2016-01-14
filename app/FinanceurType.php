<?php

namespace ModuleFormation;

class FinanceurType extends AbstractModel
{
    protected $fillable = ['libelle'];
//
    function financeurs() {
        return $this->hasMany('ModuleFormation\Financeur');
    }
}
