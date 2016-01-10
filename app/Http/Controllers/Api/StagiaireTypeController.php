<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\StagiaireTypeRepositoryInterface;

class StagiaireTypeController extends AbstractController
{
    protected $validation_rules = [
        'libelle' => 'required',
        'is_salarie' => 'required|boolean',
        'is_fonctionnaire' => 'required|boolean',
        'is_demandeur_emploi' => 'required|boolean',
        'is_contrat_pro' => 'required|boolean',
    ];

    public function __construct(StagiaireTypeRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
