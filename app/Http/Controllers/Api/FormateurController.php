<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\FormateurRepositoryInterface;

class FormateurController extends AbstractController
{
    protected $validation_rules = [
        'nom' => 'required',
        'date_naissance' => 'dateformat:Y-m-d\TH:i:s.u\Z',
        'email' => 'email',
        'formateur_type_id' => 'required',
    ];

    public function __construct(FormateurRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}

