<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\ModuleRepositoryInterface;

class ModuleController extends AbstractController
{
    public function __construct(ModuleRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
