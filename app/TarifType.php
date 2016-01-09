<?php

namespace ModuleFormation;

class TarifType extends AbstractModel
{

    public function tarifs() {
        return $this->hasMany('ModuleFormation\Tarif');
    }
}
