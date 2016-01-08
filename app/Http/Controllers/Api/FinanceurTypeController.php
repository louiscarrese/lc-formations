<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\FinanceurTypeRepositoryInterface;

class FinanceurTypeController extends AbstractController
{
    public function __construct(FinanceurTypeRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    protected function extractData($request) 
    {
        //TODO: input validation
        $ret['id'] = $request->input('id');
        $ret['libelle'] = $request->input('libelle');

        return $ret;
    }
}
