<?php

namespace ModuleFormation;

class DomaineFormation extends AbstractModel
{
    protected $fillable = ['id', 'libelle'];

    public function modules() {
        return $this->hasMany('ModuleFormation\Module');
    }
}
