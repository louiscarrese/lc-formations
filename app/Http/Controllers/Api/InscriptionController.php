<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\InscriptionRepositoryInterface;

class InscriptionController extends AbstractController
{
    protected $filters = ['stagiaire_id' => 'stagiaire_id'];

    protected $validation_rules = [
        'stagiaire_id' => 'required',
        'session_id' => 'required',
    ];

    public function __construct(InscriptionRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
