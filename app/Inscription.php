<?php

namespace ModuleFormation;

class Inscription extends AbstractModel
{
    //Define status as constants
    const STATUS_PENDING = "pending";
    const STATUS_VALIDATED = "validated";
    const STATUS_CANCELED = "canceled";
    const STATUS_WITHDRAWN = "withdrawn";
    const STATUS_WAITING_LIST = "waiting_list";


    protected $with = ['stagiaire', 'session.module'];

    protected $fillable = ['id', 'profession_structure', 'experiences', 'attentes', 
        'suggestions', 'formations_precedentes', 'statut', 'stagiaire_id', 'session_id'];

    function stagiaire() {
        return $this->belongsTo('ModuleFormation\Stagiaire');
    }

    function session() {
        return $this->belongsTo('ModuleFormation\Session');
    }

    function financements() {
        return $this->hasMany('ModuleFormation\FinanceurInscription');
    }

    function financeurs() {
        return $this->hasManyThrough('ModuleFormation\Financeur', 'ModuleFormation\FinanceurInscription');
    }

    public function scopeCurrent($query) {
        $currentDate = \Carbon\Carbon::now();

        $startDate = null;
        $endDate = null;

        if($currentDate->month < 8) {
            $startDate = $currentDate->copy()->subYear()->month(8)->startOfMonth();
            $endDate = $currentDate->copy()->month(7)->endOfMonth();
        } else {
            $startDate = $currentDate->copy()->month(8)->startOfMonth();
            $endDate = $currentDate->copy()->addYear()->month(7)->endOfMonth();
        }

        return $query->whereHas('session.session_jours', function($q) use ($startDate, $endDate) {
            $q->whereBetween('date', [$startDate, $endDate]);
        });
    }

}
