<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\EmployeurRepositoryInterface;

class EmployeurController extends AbstractController
{
    protected $validation_rules = [
        'email' => 'email'
    ];

    public function __construct(EmployeurRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
