<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\StagiaireTypeRepositoryInterface;

class StagiaireTypeController extends AbstractController
{
    public function __construct(StagiaireTypeRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    protected function extractData($request) 
    {
        //TODO: input validation
        $ret['id'] = $request->input('id');
        $ret['libelle'] = $request->input('libelle');
        $ret['is_salarie'] = $request->input('is_salarie');
        $ret['is_fonctionnaire'] = $request->input('is_fonctionnaire');
        $ret['is_contrat_pro'] = $request->input('is_contrat_pro');
        $ret['is_demandeur_emploi'] = $request->input('is_demandeur_emploi');

        return $ret;
    }
}
