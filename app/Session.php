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

        $parametreRepository = \Illuminate\Foundation\Application::getInstance()->make('ModuleFormation\Repositories\ParametreRepositoryInterface');

        $limitDateString = $parametreRepository->findBy(['key' => 'debut_saison'])->first()->value;
        $limitDate = \Carbon\Carbon::createFromFormat('d/m/Y', $limitDateString);

        return $query->whereHas('session_jours', function($q) use ($limitDate) {
            $q->where('date', '>', $limitDate);
        })
        ->orWhereNotExists(function ($q) {
            $q->select(\DB::Raw(1))
                ->from('session_jours')
                ->whereRaw('session_jours.session_id = sessions.id');
        });
    }

}
