<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\StagiaireRepositoryInterface;

class StagiaireController extends AbstractController
{
    protected $validation_rules = [
        'nom' => 'required',
        'date_naissance' => 'date_format:Y-m-d\TH:i:s.u\Z',
        'email' => 'email',
        'demandeur_emploi_depuis' => 'date_format:Y-m-d\TH:i:s.u\Z',
    ];

    public function __construct(StagiaireRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
