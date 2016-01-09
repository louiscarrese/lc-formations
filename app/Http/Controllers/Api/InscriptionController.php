<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\InscriptionRepositoryInterface;

class InscriptionController extends AbstractController
{
    public function __construct(InscriptionRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
