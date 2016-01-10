<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\FinanceurTypeRepositoryInterface;

class FinanceurTypeController extends AbstractController
{
    protected $validation_rules = [
        'libelle' => 'required',
    ];

    public function __construct(FinanceurTypeRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
