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

        $parametreRepository = \Illuminate\Foundation\Application::getInstance()->make('ModuleFormation\Repositories\ParametreRepositoryInterface');

        $limitDateString = $parametreRepository->findBy(['key' => 'debut_saison'])->first()->value;
        $limitDate = \Carbon\Carbon::createFromFormat('d/m/Y', $limitDateString);

        return $query->whereHas('session.session_jours', function($q) use ($limitDate) {
            $q->where('date', '>', $limitDate);
        })
        ->orWhereNotExists(function ($q) {
            $q->select(\DB::Raw(1))
                ->from('session_jours')
                ->whereRaw('session_jours.session_id = inscriptions.session_id');
        });
    }

}
