<?php

namespace ModuleFormation\Http\Controllers\Api;

use Log;
use DB;
use Illuminate\Http\Request;
use ModuleFormation\Http\Requests;
use ModuleFormation\Http\Controllers\Controller;

class StagiaireController extends Controller
{


    public function index(Request $request) 
    {
        //Initialize the request
        $stagiaires_req = \ModuleFormation\Stagiaire::with('stagiaire_type', 'employeur');

        //Add parameters if any

        //Execute request
        $stagiaires = $stagiaires_req->get();


        return response()->json($stagiaires);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stagiaire = new \ModuleFormation\Stagiaire;
        $stagiaire->nom = $request->input('nom');
        $stagiaire->prenom = $request->input('prenom');
        $stagiaire->sexe = $request->input('sexe');
        $stagiaire->date_naissance = $request->input('date_naissance');
        $stagiaire->adresse = $request->input('adresse');
        $stagiaire->code_postal = $request->input('code_postal');
        $stagiaire->ville = $request->input('ville');
        $stagiaire->tel_portable = $request->input('tel_portable');
        $stagiaire->tel_fixe = $request->input('tel_fixe');
        $stagiaire->email = $request->input('email');
        $stagiaire->profession = $request->input('profession');
        $stagiaire->etudes = $request->input('etudes');
        $stagiaire->demandeur_emploi_depuis = $request->input('demandeur_emploi_depuis');
        $stagiaire->niveau_qualification = $request->input('niveau_qualification');
        $stagiaire->domaine_pro = $request->input('domaine_pro');

        $stagiaire->employeur_id = $request->input('employeur_id');
        $stagiaire->stagiaire_type_id = $request->input('stagiaire_type_id');

        $stagiaire->save();

        //Regrab it with its module
        $stagiaire = \ModuleFormation\Stagiaire::with('stagiaire_type', 'employeur')->findOrFail($stagiaire->id);
        return response()->json($stagiaire);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($stagiaireId)
    {
        $stagiaire = \ModuleFormation\Stagiaire::with('stagiaire_type', 'employeur')->findOrFail($stagiaireId);
        return response()->json($stagiaire);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $stagiaireId)
    {
        $stagiaire = \ModuleFormation\Stagiaire::findOrFail($stagiaireId);

        $stagiaire->id = $request->input('id');
        $stagiaire->nom = $request->input('nom');
        $stagiaire->prenom = $request->input('prenom');
        $stagiaire->sexe = $request->input('sexe');
        $stagiaire->date_naissance = $request->input('date_naissance');
        $stagiaire->adresse = $request->input('adresse');
        $stagiaire->code_postal = $request->input('code_postal');
        $stagiaire->ville = $request->input('ville');
        $stagiaire->tel_portable = $request->input('tel_portable');
        $stagiaire->tel_fixe = $request->input('tel_fixe');
        $stagiaire->email = $request->input('email');
        $stagiaire->profession = $request->input('profession');
        $stagiaire->etudes = $request->input('etudes');
        $stagiaire->demandeur_emploi_depuis = $request->input('demandeur_emploi_depuis');
        $stagiaire->niveau_qualification = $request->input('niveau_qualification');
        $stagiaire->domaine_pro = $request->input('domaine_pro');

        $stagiaire->employeur_id = $request->input('employeur_id');
        $stagiaire->stagiaire_type_id = $request->input('stagiaire_type_id');

        $stagiaire->save();

        //Regrab it with its module
        $stagiaire = \ModuleFormation\Stagiaire::with('stagiaire_type', 'employeur')->findOrFail($stagiaireId);
        return response()->json($stagiaire);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \ModuleFormation\Stagiaire::destroy($id);

    }
}
