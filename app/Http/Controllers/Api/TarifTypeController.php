<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\TarifTypeRepositoryInterface;

class TarifTypeController extends AbstractController
{
    public function __construct(TarifTypeRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
