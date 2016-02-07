<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\ModuleRepositoryInterface;

class ModuleController extends AbstractController
{
    protected $validation_rules = [
        'libelle' => 'required',
        'heure_debut_matin' => 'date_format:H:i',
        'heure_fin_matin' => 'date_format:H:i',
        'heure_debut_apresmidi' => 'date_format:H:i',
        'heure_fin_apresmidi' => 'date_format:H:i',
        'domaine_formation_id' => 'required',
        'code_formation' => 'required',
    ];

    public function __construct(ModuleRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
