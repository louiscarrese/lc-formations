<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\TarifRepositoryInterface;

class TarifController extends AbstractController
{
    protected $filters = ['module_id' => 'module_id'];

    public function __construct(TarifRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    protected function extractData($request) 
    {
        //TODO: input validation
        $ret['module_id'] = $request->input('module_id');
        $ret['tarif_type_id'] = $request->input('tarif_type_id');
        $ret['montant'] = $request->input('montant');
        
        return $ret;
    }
}
