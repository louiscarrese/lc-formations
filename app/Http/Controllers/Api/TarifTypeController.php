<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\TarifTypeRepositoryInterface;

class TarifTypeController extends AbstractController
{
    public function __construct(TarifTypeRepositoryInterface $repository)
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
