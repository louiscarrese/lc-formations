<?php

namespace ModuleFormation;

class StagiaireType extends AbstractModel
{

    protected $fillable = ['id', 'libelle', 'is_salarie', 'is_fonctionnaire', 'is_contrat_pro', 'is_demandeur_emploi'];

    public function stagiaires() {
        return $this->hasMany('ModuleFormation\Stagiaire');
    }
}
