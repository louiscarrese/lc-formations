<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\ParametreRepositoryInterface;

class ParametreController extends AbstractController
{
    protected $validation_rules = [
        'key' => 'required',
        'value' => 'required',
    ];

    public function __construct(ParametreRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
