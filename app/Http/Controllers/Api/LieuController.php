<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\LieuRepositoryInterface;

class LieuController extends AbstractController
{
    public function __construct(LieuRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
