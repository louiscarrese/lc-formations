<?php

namespace ModuleFormation;

class Tarif extends AbstractModel
{
    protected $with = ['tarif_type'];

    protected $fillable = ['id', 'module_id', 'tarif_type_id', 'montant'];

    public function module() {
        return $this->belongsTo('ModuleFormation\Module');
    }

    public function tarif_type() {
        return $this->belongsTo('ModuleFormation\TarifType');
    }
}
