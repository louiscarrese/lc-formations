<?php

namespace ModuleFormation;

class Session extends AbstractModel
{

    protected $with = ['module'];

    protected $fillable = ['id', 'effectif_max', 'objectifs_pedagogiques', 'materiel', 'module_id'];

    public function module() {
        return $this->belongsTo('ModuleFormation\Module');
    }

    public function session_jours() {
        return $this->hasMany('ModuleFormation\SessionJour');
    }

    public function inscriptions() {
        return $this->hasMany('ModuleFormation\Inscription');
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

        return $query->whereHas('session_jours', function($q) use ($startDate, $endDate) {
            $q->whereBetween('date', [$startDate, $endDate]);
        })
        ->orWhereNotExists(function ($q) {
            $q->select(\DB::Raw(1))
                ->from('session_jours')
                ->whereRaw('session_jours.session_id = sessions.id');
        });
    }

}
