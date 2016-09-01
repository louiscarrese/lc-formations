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


    protected $with = ['stagiaire', 'session.module', 'tarif'];

    protected $fillable = ['id', 'profession_structure', 'experiences', 'attentes', 
        'suggestions', 'formations_precedentes', 'statut', 'stagiaire_id', 'session_id', 'tarif_id'];

    public $searchable = ['profession_structure', 'experiences', 'attentes', 'suggestions', 'formations_precedentes', 'statut'];

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

    function tarif() {
        return $this->belongsTo('ModuleFormation\Tarif');
    }

    public function scopeCurrent($query) {
        $currentDate = \Carbon\Carbon::now();

        $parametreRepository = \Illuminate\Foundation\Application::getInstance()->make('ModuleFormation\Repositories\ParametreRepositoryInterface');

        $limitDate = $parametreRepository->debutSaison();

        return $query->where(function($qu) use ($limitDate) {
            $qu->whereHas('session.session_jours', function($q) use ($limitDate) {
                $q->where('date', '>', $limitDate);
            })
            ->orWhereNotExists(function ($q) {
                $q->select(\DB::Raw(1))
                    ->from('session_jours')
                    ->whereRaw('session_jours.session_id = inscriptions.session_id');
            });
        });

    }

}
