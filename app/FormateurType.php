<?php

namespace ModuleFormation;

class FormateurType extends AbstractModel
{
    protected $fillable = ['id', 'libelle'];

    public $searchable = ['id'];
    
    public function formateurs() {
        return $this->hasMany('ModuleFormation\Formateur');
    }
}
