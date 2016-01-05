<?php

namespace ModuleFormation\Http\Controllers\Api;

use Log;
use DB;
use Illuminate\Http\Request;
use ModuleFormation\Http\Requests;
use ModuleFormation\Http\Controllers\Controller;

class FinanceurController extends Controller
{


    public function index(Request $request) 
    {
        //Initialize the request
        $financeurs_req = \ModuleFormation\Financeur::with('financeur_type');

        //Add parameters if any

        //Execute request
        $financeurs = $financeurs_req->get();


        return response()->json($financeurs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $financeur = new \ModuleFormation\Financeur;
        $financeur->libelle = $request->input('libelle');
        $financeur->structure = $request->input('structure');
        $financeur->nom = $request->input('nom');
        $financeur->prenom = $request->input('prenom');
        $financeur->adresse = $request->input('adresse');
        $financeur->code_postal = $request->input('code_postal');
        $financeur->ville = $request->input('ville');
        $financeur->tel = $request->input('tel');
        $financeur->email = $request->input('email');
        $financeur->financeur_type_id = $request->input('financeur_type_id');

        $financeur->save();

        //Regrab it with its module
        $financeur = \ModuleFormation\Financeur::with('financeur_type')->findOrFail($financeur->id);
        return response()->json($financeur);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($financeurId)
    {
        $financeur = \ModuleFormation\Financeur::with('financeur_type')->findOrFail($financeurId);
        return response()->json($financeur);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $financeurId)
    {
        $financeur = \ModuleFormation\Financeur::findOrFail($financeurId);

        $financeur->id = $request->input('id');
        $financeur->libelle = $request->input('libelle');
        $financeur->structure = $request->input('structure');
        $financeur->nom = $request->input('nom');
        $financeur->prenom = $request->input('prenom');
        $financeur->adresse = $request->input('adresse');
        $financeur->code_postal = $request->input('code_postal');
        $financeur->ville = $request->input('ville');
        $financeur->tel = $request->input('tel');
        $financeur->email = $request->input('email');
        $financeur->financeur_type_id = $request->input('financeur_type_id');

        $financeur->save();

        //Regrab it with its module
        $financeur = \ModuleFormation\Financeur::with('financeur_type')->findOrFail($financeurId);
        return response()->json($financeur);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \ModuleFormation\Financeur::destroy($id);

    }
}
