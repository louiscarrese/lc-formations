<?php

namespace ModuleFormation;

class DomaineFormation extends AbstractModel
{

    public function modules() {
        return $this->hasMany('ModuleFormation\Module');
    }
}
