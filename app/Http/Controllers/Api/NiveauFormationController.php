<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\NiveauFormationRepositoryInterface;

class NiveauFormationController extends AbstractController
{
    public function __construct(NiveauFormationRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
