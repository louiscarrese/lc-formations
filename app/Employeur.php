<?php

namespace ModuleFormation;

class Employeur extends AbstractModel
{
    protected $fillable = ['id', 'nom', 'raison_sociale', 'adresse', 'code_postal', 'ville', 'telephone', 'email', 'contact'];

    public function stagiaire() {
        return $this->hasMany('ModuleFormation\Stagiaire');
    }
}
