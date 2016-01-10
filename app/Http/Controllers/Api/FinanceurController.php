<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\FinanceurRepositoryInterface;

class FinanceurController extends AbstractController
{
    protected $validation_rules = [
        'email' => 'email',
    ];

    public function __construct(FinanceurRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
