<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\TarifTypeRepositoryInterface;

class TarifTypeController extends AbstractController
{
    protected $validation_rules = [
        'libelle' => 'required',
    ];

    public function __construct(TarifTypeRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
