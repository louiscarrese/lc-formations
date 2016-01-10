<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\SessionRepositoryInterface;

class SessionController extends AbstractController
{
    protected $filters = ['module_id' => 'module_id'];

    protected $validation_rules = [
        'module_id' => 'required';
    ];

    public function __construct(SessionRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
