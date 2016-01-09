<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\FinanceurRepositoryInterface;

class FinanceurController extends AbstractController
{
    public function __construct(FinanceurRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
