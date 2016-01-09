<?php

namespace ModuleFormation;

class FinanceurType extends AbstractModel
{
    //
    function financeurs() {
        return $this->hasMany('ModuleFormation\Financeur');
    }
}
