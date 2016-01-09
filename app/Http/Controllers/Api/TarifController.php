<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\TarifRepositoryInterface;

class TarifController extends AbstractController
{
    protected $filters = ['module_id' => 'module_id'];

    public function __construct(TarifRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
