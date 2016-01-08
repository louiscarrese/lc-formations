<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\SessionRepositoryInterface;

class SessionController extends AbstractController
{
    protected $filters = ['module_id' => 'module_id'];

    public function __construct(SessionRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    protected function extractData($request) 
    {
        //TODO: input validation
        $ret['nb_jours'] = $request->input('nb_jours');
        $ret['effectif_max'] = $request->input('effectif_max');
        $ret['objectifs_pedagogiques'] = $request->input('objectifs_pedagogiques');
        $ret['materiel'] = $request->input('materiel');
        $ret['module_id'] = $request->input('module_id');

        return $ret;
    }
}
