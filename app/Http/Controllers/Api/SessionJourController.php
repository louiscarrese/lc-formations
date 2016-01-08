<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\SessionJourRepositoryInterface;

class SessionJourController extends AbstractController
{
    public function __construct(SessionJourRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    protected function extractData($request) 
    {
        //TODO: input validation
        $ret['id'] = $request->input('id');
        $ret['date'] = $request->input('date');
        $ret['heure_debut'] = $request->input('heure_debut');
        $ret['heure_fin'] = $request->input('heure_fin');
        $ret['lieu_id'] = $request->input('lieu_id');
        $ret['session_id'] = $request->input('session_id');
        $ret['formateurs_id'] = $request->input('formateurs_id');

        return $ret;
    }
}
