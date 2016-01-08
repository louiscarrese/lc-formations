<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\FinanceurRepositoryInterface;

class FinanceurController extends AbstractController
{
    public function __construct(FinanceurRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    protected function extractData($request) 
    {
        //TODO: input validation
        $ret['id'] = $request->input('id');
        $ret['libelle'] = $request->input('libelle');
        $ret['structure'] = $request->input('structure');
        $ret['nom'] = $request->input('nom');
        $ret['prenom'] = $request->input('prenom');
        $ret['adresse'] = $request->input('adresse');
        $ret['code_postal'] = $request->input('code_postal');
        $ret['ville'] = $request->input('ville');
        $ret['tel'] = $request->input('tel');
        $ret['email'] = $request->input('email');
        $ret['financeur_type_id'] = $request->input('financeur_type_id');

        return $ret;
    }
}
