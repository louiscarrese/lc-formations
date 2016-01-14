<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\FinanceurInscriptionRepositoryInterface;

class FinanceurInscriptionController extends AbstractController
{
    protected $validation_rules = [
    ];

    protected $filters = ['inscription_id' => 'inscription_id'];

    public function __construct(FinanceurInscriptionRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
