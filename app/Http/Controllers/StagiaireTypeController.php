<?php

namespace ModuleFormation\Http\Controllers;

use Illuminate\Http\Request;
use ModuleFormation\Http\Requests;
use ModuleFormation\Http\Controllers\Controller;
use ModuleFormation\StagiaireType;
use ModuleFormation\Http\Controllers\CustomResponse;

class StagiaireTypeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $stagiaire_types = StagiaireType::all();
        if($request->acceptsJson()) {
            return response()->json($stagiaire_types);
        } else {
            return 'Hello !';
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stagiaire_type = new StagiaireType;
        $stagiaire_type->libelle = $request->input('libelle');
        $stagiaire_type->is_salarie = ($request->input('is_salarie') === true ? true : false);
        $stagiaire_type->is_fonctionnaire = ($request->input('is_fonctionnaire') === true ? true : false);
        $stagiaire_type->is_contrat_pro = ($request->input('is_contrat_pro') === true ? true : false);
        $stagiaire_type->is_demandeur_emploi = ($request->input('is_demandeur_emploi') === true ? true : false);
        $stagiaire_type->save();

        return response()->json($stagiaire_type);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stagiaire_type = StagiaireType::findOrFail($id);
        return response()->json($stagiaire_type);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $stagiaire_type = StagiaireType::findOrFail($id);

        $stagiaire_type->id = $request->input('id');
        $stagiaire_type->libelle = $request->input('libelle');
        $stagiaire_type->is_salarie = ($request->input('is_salarie') === true ? true : false);
        $stagiaire_type->is_fonctionnaire = ($request->input('is_fonctionnaire') === true ? true : false);
        $stagiaire_type->is_contrat_pro = ($request->input('is_contrat_pro') === true ? true : false);
        $stagiaire_type->is_demandeur_emploi = ($request->input('is_demandeur_emploi') === true ? true : false);

        $stagiaire_type->save();

        return response()->json($stagiaire_type);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        StagiaireType::destroy($id);
    }


}
