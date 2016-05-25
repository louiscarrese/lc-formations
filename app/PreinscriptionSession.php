<?php

namespace ModuleFormation;

class PreinscriptionSession extends AbstractModel
{

    protected $fillable = ['financement',
        'financement_employeur_nom_structure','financement_employeur_secteur_activite','financement_employeur_signataire',
        'financement_employeur_adresse','financement_employeur_code_postal','financement_employeur_ville',
        'financement_employeur_tel','financement_employeur_email',
        'financement_employeur_siret','financement_employeur_naf','financement_employeur_effectif',
        'financement_afdas_intermittent','financement_autre',
        'attentes','preinscription_id','tarif_id', 'session_id', 'employeur_id'];

    protected $with = ['session'];

    public function preinscription() {
        return $this->belongsTo('ModuleFormation\Preinscription');
    }

    public function tarif() {
        return $this->belongsTo('ModuleFormation\Tarif');
    }
    public function session() {
        return $this->belongsTo('ModuleFormation\Session');
    }
    public function employeur() {
        return $this->belongsTo('ModuleFormation\Employeur');
    }
}
