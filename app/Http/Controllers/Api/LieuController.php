<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\LieuRepositoryInterface;

class LieuController extends AbstractController
{
    protected $validation_rules = [
        'libelle' => 'required',
    ];

    public function __construct(LieuRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
