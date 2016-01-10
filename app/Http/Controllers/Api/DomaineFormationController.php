<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\DomaineFormationRepositoryInterface;

class DomaineFormationController extends AbstractController
{
    protected $validation_rules = [
        'libelle' => 'required',
    ];

    public function __construct(DomaineFormationRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
