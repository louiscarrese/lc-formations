<?php

namespace ModuleFormation;

class Financeur extends AbstractModel
{
    protected $with = ['financeur_type'];

    protected $fillable = ['id', 'libelle', 'structure', 'nom', 'prenom', 'adresse', 'code_postal', 'ville', 'tel', 'email', 'financeur_type_id'];

    public $searchable = ['libelle', 'structure', 'nom', 'prenom', 'adresse', 'code_postal', 'ville', 'tel', 'email'];

    function financeur_type() {
        return $this->belongsTo('ModuleFormation\FinanceurType');
    }

    function financements() {
        return $this->hasMany('ModuleFormation\FinanceurInscription');
    }

    function inscriptions() {
        return $this->hasManyThrough('ModuleFormation\Inscription', 'ModuleFormation\FinanceurInscription');
    }

}
