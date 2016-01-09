<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\FormateurRepositoryInterface;

class FormateurController extends AbstractController
{
    public function __construct(FormateurRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}

