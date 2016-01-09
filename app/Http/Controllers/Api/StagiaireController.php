<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\StagiaireRepositoryInterface;

class StagiaireController extends AbstractController
{
    public function __construct(StagiaireRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
