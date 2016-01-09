<?php

namespace ModuleFormation;

class FormateurType extends AbstractModel
{
    protected $fillable = ['id', 'libelle'];
    
    public function formateurs() {
        return $this->hasMany('ModuleFormation\Formateur');
    }
}
