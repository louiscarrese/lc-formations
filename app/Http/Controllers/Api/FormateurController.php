<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\FormateurRepositoryInterface;

class FormateurController extends AbstractController
{
    public function __construct(FormateurRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    protected function extractData($request) 
    {
        //TODO: input validation
        $ret['id'] = $request->input('id');
        $ret['nom'] = $request->input('nom');
        $ret['prenom'] = $request->input('prenom');
        $ret['sexe'] = $request->input('sexe');
        $ret['date_naissance'] = $request->input('date_naissance');
        $ret['adresse'] = $request->input('adresse');
        $ret['code_postal'] = $request->input('code_postal');
        $ret['ville'] = $request->input('ville');
        $ret['tel_portable'] = $request->input('tel_portable');
        $ret['tel_fixe'] = $request->input('tel_fixe');
        $ret['email'] = $request->input('email');
        $ret['formateur_type_id'] = $request->input('formateur_type_id');

        return $ret;
    }
}

