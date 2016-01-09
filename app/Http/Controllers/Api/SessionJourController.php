<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\SessionJourRepositoryInterface;

class SessionJourController extends AbstractController
{
    public function __construct(SessionJourRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
