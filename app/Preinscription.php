<?php

namespace ModuleFormation;

class Preinscription extends AbstractModel
{

    protected $with = ['preinscription_sessions'];

    protected $fillable = ['genre', 'nom', 'prenom', 'date_naissance', 
        'adresse', 'code_postal', 'ville', 'tel_fixe', 'tel_portable', 'email', 
        'adherent', 'statut', 
        'salarie_type', 'demandeur_emploi_type', 'etudiant_etudes', 'type_autre', 
        'profession', 'experiences', 'suggestions', 'formations_precedentes'];


    public function preinscription_sessions() {
        return $this->hasMany('ModuleFormation\PreinscriptionSession');
    }
}


