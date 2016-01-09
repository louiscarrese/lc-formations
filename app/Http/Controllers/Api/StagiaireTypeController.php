<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\StagiaireTypeRepositoryInterface;

class StagiaireTypeController extends AbstractController
{
    public function __construct(StagiaireTypeRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
