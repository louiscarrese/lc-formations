<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\PreinscriptionRepositoryInterface;

class PreinscriptionController extends AbstractController
{
    protected $validation_rules = [

    ];

    public function __construct(PreinscriptionRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
