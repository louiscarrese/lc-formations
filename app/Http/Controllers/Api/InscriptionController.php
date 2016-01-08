<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\InscriptionRepositoryInterface;

class InscriptionController extends AbstractController
{
    public function __construct(InscriptionRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    protected function extractData($request) 
    {
        //TODO: input validation
        $ret['id'] = $request->input('id');
        $ret['profession_structure'] = $request->input('profession_structure');
        $ret['experiences'] = $request->input('experiences');
        $ret['attentes'] = $request->input('attentes');
        $ret['suggestions'] = $request->input('suggestions');
        $ret['formations_precedentes'] = $request->input('formations_precedentes');
        $ret['stagiaire_id'] = $request->input('stagiaire_id');
        $ret['session_id'] = $request->input('session_id');

        return $ret;
    }
}
