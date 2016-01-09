<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\DomaineFormationRepositoryInterface;

class DomaineFormationController extends AbstractController
{
    public function __construct(DomaineFormationRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
