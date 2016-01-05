<?php

namespace ModuleFormation\Http\Controllers\Api;

use Log;
use DB;
use Illuminate\Http\Request;
use ModuleFormation\Http\Requests;
use ModuleFormation\Http\Controllers\Controller;

class InscriptionController extends Controller
{


    public function index(Request $request) 
    {
        //Initialize the request
        $inscriptions = \ModuleFormation\Inscription::with('stagiaire', 'session.module')->get();

        return response()->json($inscriptions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inscription = new \ModuleFormation\Inscription;
        $inscription->profession_structure = $request->input('profession_structure');
        $inscription->experiences = $request->input('experiences');
        $inscription->attentes = $request->input('attentes');
        $inscription->suggestions = $request->input('suggestions');
        $inscription->formations_precedentes = $request->input('formations_precedentes');
        $inscription->stagiaire_id = $request->input('stagiaire_id');
        $inscription->session_id = $request->input('session_id');

        $inscription->save();

        //Regrab it with its module
        $inscription = \ModuleFormation\Inscription::with('stagiaire', 'session.module')->findOrFail($inscription->id);
        return response()->json($inscription);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($inscriptionId)
    {
        $inscription = \ModuleFormation\Inscription::with('stagiaire', 'session.module')->findOrFail($inscriptionId);
        return response()->json($inscription);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $inscriptionId)
    {
        $inscription = \ModuleFormation\Inscription::findOrFail($inscriptionId);

        $inscription->id = $request->input('id');
        $inscription->profession_structure = $request->input('profession_structure');
        $inscription->experiences = $request->input('experiences');
        $inscription->attentes = $request->input('attentes');
        $inscription->suggestions = $request->input('suggestions');
        $inscription->formations_precedentes = $request->input('formations_precedentes');
        $inscription->stagiaire_id = $request->input('stagiaire_id');
        $inscription->session_id = $request->input('session_id');
        $inscription->save();

        //Regrab it with its module
        $inscription = \ModuleFormation\Inscription::with('stagiaire', 'session.module')->findOrFail($inscriptionId);
        return response()->json($inscription);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \ModuleFormation\Inscription::destroy($id);

    }
}
