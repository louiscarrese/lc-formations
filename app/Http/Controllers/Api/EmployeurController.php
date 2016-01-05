<?php

namespace ModuleFormation\Http\Controllers\Api;

use Log;
use DB;
use Illuminate\Http\Request;
use ModuleFormation\Http\Requests;
use ModuleFormation\Http\Controllers\Controller;

class EmployeurController extends Controller
{


    public function index(Request $request) 
    {
        //Initialize the request
        $employeurs = \ModuleFormation\Employeur::get();

        return response()->json($employeurs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employeur = new \ModuleFormation\Employeur;
        $employeur->nom = $request->input('nom');
        $employeur->raison_sociale = $request->input('raison_sociale');
        $employeur->adresse = $request->input('adresse');
        $employeur->code_postal = $request->input('code_postal');
        $employeur->ville = $request->input('ville');
        $employeur->telephone = $request->input('telephone');
        $employeur->email = $request->input('email');
        $employeur->contact = $request->input('contact');

        $employeur->save();

        //Regrab it with its module
        $employeur = \ModuleFormation\Employeur::findOrFail($employeur->id);
        return response()->json($employeur);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($employeurId)
    {
        $employeur = \ModuleFormation\Employeur::findOrFail($employeurId);
        return response()->json($employeur);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $employeurId)
    {
        $employeur = \ModuleFormation\Employeur::findOrFail($employeurId);

        $employeur->id = $request->input('id');
        $employeur->nom = $request->input('nom');
        $employeur->raison_sociale = $request->input('raison_sociale');
        $employeur->adresse = $request->input('adresse');
        $employeur->code_postal = $request->input('code_postal');
        $employeur->ville = $request->input('ville');
        $employeur->telephone = $request->input('telephone');
        $employeur->email = $request->input('email');
        $employeur->contact = $request->input('contact');

        $employeur->save();

        //Regrab it with its module
        $employeur = \ModuleFormation\Employeur::findOrFail($employeurId);
        return response()->json($employeur);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \ModuleFormation\Employeur::destroy($id);
    }
}