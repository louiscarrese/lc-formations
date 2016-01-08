<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\StagiaireRepositoryInterface;

class StagiaireController extends AbstractController
{
    public function __construct(StagiaireRepositoryInterface $repository)
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
        $ret['profession'] = $request->input('profession');
        $ret['etudes'] = $request->input('etudes');
        $ret['demandeur_emploi_depuis'] = $request->input('demandeur_emploi_depuis');
        $ret['niveau_qualification'] = $request->input('niveau_qualification');
        $ret['domaine_pro'] = $request->input('domaine_pro');

        $ret['employeur_id'] = $request->input('employeur_id');
        $ret['stagiaire_type_id'] = $request->input('stagiaire_type_id');
        
        return $ret;
    }
}
