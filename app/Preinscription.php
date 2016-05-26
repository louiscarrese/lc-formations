<?php

namespace ModuleFormation;

class Preinscription extends AbstractModel
{

    protected $with = ['preinscription_sessions', 'stagiaire'];

    protected $fillable = ['sexe', 'nom', 'prenom', 'date_naissance', 
        'adresse', 'code_postal', 'ville', 'tel_fixe', 'tel_portable', 'email', 
        'adherent', 'statut', 
        'salarie_type', 'demandeur_emploi_type', 'etudiant_etudes', 'type_autre', 
        'profession', 'experiences', 'suggestions', 'formations_precedentes', 'stagiaire_id'];


    protected static $myDates = ['date_naissance'];

    public function preinscription_sessions() {
        return $this->hasMany('ModuleFormation\PreinscriptionSession');
    }

    public function stagiaire() {
        return $this->belongsTo('ModuleFormation\Stagiaire');
    }
}


