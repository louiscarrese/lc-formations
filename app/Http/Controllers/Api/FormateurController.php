<?php

namespace ModuleFormation\Http\Controllers\Api;

use Log;
use DB;
use Illuminate\Http\Request;
use ModuleFormation\Http\Requests;
use ModuleFormation\Http\Controllers\Controller;

class FormateurController extends Controller
{


    public function index(Request $request) 
    {
        //Initialize the request
        $formateurs_req = \ModuleFormation\Formateur::with('formateur_type');

        //Add parameters if any

        //Execute request
        $formateurs = $formateurs_req->get();


        return response()->json($formateurs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formateur = new \ModuleFormation\Formateur;
        $formateur->nom = $request->input('nom');
        $formateur->prenom = $request->input('prenom');
        $formateur->sexe = $request->input('sexe');
        $formateur->date_naissance = $request->input('date_naissance');
        $formateur->adresse = $request->input('adresse');
        $formateur->code_postal = $request->input('code_postal');
        $formateur->ville = $request->input('ville');
        $formateur->tel_portable = $request->input('tel_portable');
        $formateur->tel_fixe = $request->input('tel_fixe');
        $formateur->email = $request->input('email');
        $formateur->formateur_type_id = $request->input('formateur_type_id');

        $formateur->save();

        //Regrab it with its module
        $formateur = \ModuleFormation\Formateur::with('formateur_type')->findOrFail($formateur->id);
        return response()->json($formateur);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($formateurId)
    {
        $formateur = \ModuleFormation\Formateur::with('formateur_type')->findOrFail($formateurId);
        return response()->json($formateur);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $formateurId)
    {
        $formateur = \ModuleFormation\Formateur::findOrFail($formateurId);

        $formateur->id = $request->input('id');
        $formateur->nom = $request->input('nom');
        $formateur->prenom = $request->input('prenom');
        $formateur->sexe = $request->input('sexe');
        $formateur->date_naissance = $request->input('date_naissance');
        $formateur->adresse = $request->input('adresse');
        $formateur->code_postal = $request->input('code_postal');
        $formateur->ville = $request->input('ville');
        $formateur->tel_portable = $request->input('tel_portable');
        $formateur->tel_fixe = $request->input('tel_fixe');
        $formateur->email = $request->input('email');
        $formateur->formateur_type_id = $request->input('formateur_type_id');

        $formateur->save();

        //Regrab it with its module
        $formateur = \ModuleFormation\Formateur::with('formateur_type')->findOrFail($formateurId);
        return response()->json($formateur);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \ModuleFormation\Formateur::destroy($id);

    }
}
