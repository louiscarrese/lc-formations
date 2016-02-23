<?php

namespace ModuleFormation;

class FinanceurType extends AbstractModel
{
    protected $fillable = ['libelle'];

    public $searchable = ['libelle'];
//
    function financeurs() {
        return $this->hasMany('ModuleFormation\Financeur');
    }
}
