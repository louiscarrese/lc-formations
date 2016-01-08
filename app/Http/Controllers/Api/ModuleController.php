<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\ModuleRepositoryInterface;

class ModuleController extends AbstractController
{
    public function __construct(ModuleRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    protected function extractData($request) 
    {
        //TODO: input validation
        $ret['id'] = $request->input('id');
        $ret['libelle'] = $request->input('libelle');
        $ret['nb_jours'] = $request->input('nb_jours');
        $ret['heure_debut'] = $request->input('heure_debut');
        $ret['heure_fin'] = $request->input('heure_fin');
        $ret['effectif_max'] = $request->input('effectif_max');
        $ret['objectifs_pedagogiques'] = $request->input('objectifs_pedagogiques');
        $ret['materiel'] = $request->input('materiel');
        $ret['domaine_formation_id'] = $request->input('domaine_formation_id');
        $ret['formateurs_id'] = $request->input('formateurs_id');
        return $ret;
    }
}
