<?php

namespace ModuleFormation;

class FinanceurInscription extends AbstractModel
{
    protected $fillable = ['inscription_id', 'financeur_id', 'montant'];

    protected $with = ['financeur'];

    function financeur() {
        return $this->belongsTo('ModuleFormation\Financeur');
    }

}
