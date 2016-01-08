<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\EmployeurRepositoryInterface;

class EmployeurController extends AbstractController
{
    public function __construct(EmployeurRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    protected function extractData($request) 
    {
        //TODO: input validation
        $ret['id'] = $request->input('id');
        $ret['nom'] = $request->input('nom');
        $ret['raison_sociale'] = $request->input('raison_sociale');
        $ret['adresse'] = $request->input('adresse');
        $ret['code_postal'] = $request->input('code_postal');
        $ret['ville'] = $request->input('ville');
        $ret['telephone'] = $request->input('telephone');
        $ret['email'] = $request->input('email');
        $ret['contact'] = $request->input('contact');

        return $ret;
    }
}
