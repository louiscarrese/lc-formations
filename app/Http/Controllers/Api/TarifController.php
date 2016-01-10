<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\TarifRepositoryInterface;

class TarifController extends AbstractController
{
    protected $filters = ['module_id' => 'module_id'];

    protected $validation_rules = [
        'module_id' => 'required',
        'tarif_type_id' => 'required',
    ];

    public function __construct(TarifRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
