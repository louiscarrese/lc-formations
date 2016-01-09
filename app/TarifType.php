<?php

namespace ModuleFormation;

class TarifType extends AbstractModel
{
    protected $fillable = ['id', 'libelle'];

    public function tarifs() {
        return $this->hasMany('ModuleFormation\Tarif');
    }
}
