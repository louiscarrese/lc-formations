<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\FormateurTypeRepositoryInterface;

class FormateurTypeController extends AbstractController
{
    public function __construct(FormateurTypeRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
