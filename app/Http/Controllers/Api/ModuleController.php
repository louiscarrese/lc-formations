<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\ModuleRepositoryInterface;

class ModuleController extends AbstractController
{
    protected $validation_rules = [
        'libelle' => 'required',
        'heure_debut' => 'date_format:Y-m-d\TH:i:s.u\Z',
        'heure_fin' => 'date_format:Y-m-d\TH:i:s.u\Z',
        'domaine_formation_id' => 'required',
    ];

    public function __construct(ModuleRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
