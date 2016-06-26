<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\SessionRepositoryInterface;
use Illuminate\Http\Request;

class SessionController extends AbstractController
{
    protected $filters = ['module_id' => 'module_id'];

    protected $validation_rules = [
        'module_id' => 'required',
    ];

    public function __construct(SessionRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function generateFormateursMail(Request $request) {
        $session_id = $request->input('session_id');

        return ['mailtoLink' => $this->repository->generateFormateursMail($session_id)];
    }
}
