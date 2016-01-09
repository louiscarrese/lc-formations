<?php

namespace ModuleFormation;

class FormateurType extends AbstractModel
{
    public function formateurs() {
        return $this->hasMany('ModuleFormation\Formateur');
    }
}
