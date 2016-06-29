<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\FinanceurTypeRepositoryInterface;

class FinanceurTypeController extends AbstractStaticController
{
    public function __construct(FinanceurTypeRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

}
