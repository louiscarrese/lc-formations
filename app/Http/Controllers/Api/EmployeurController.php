<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\EmployeurRepositoryInterface;

class EmployeurController extends AbstractController
{
    public function __construct(EmployeurRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
