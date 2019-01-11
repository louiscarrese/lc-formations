<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\StagiaireTypeRepositoryInterface;

class StagiaireTypeController extends AbstractController
{
    protected $validation_rules = [
        'libelle' => 'required',
        'is_salarie' => 'boolean',
        'is_fonctionnaire' => 'boolean',
        'is_demandeur_emploi' => 'boolean',
        'is_contrat_pro' => 'boolean',
    ];

    public function __construct(StagiaireTypeRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
