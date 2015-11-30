<?php

namespace ModuleFormation\Http\Controllers\Api;

use Illuminate\Http\Request;
use ModuleFormation\Http\Requests;
use ModuleFormation\Http\Controllers\Controller;
use ModuleFormation\DomaineFormation;
class DomaineFormationController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->acceptsJson()) {
            $financeur_types = DomaineFormation::all();
            return response()->json($financeur_types);
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
        $financeur_type = new DomaineFormation;
        $financeur_type->libelle = $request->input('libelle');
        $financeur_type->save();

        return $response()->json($financeur_type);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $financeur_type = DomaineFormation::findOrFail($id);
        return response()->json($financeur_type);
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
        $financeur_type = DomaineFormation::findOrFail($id);

        $financeur_type->libelle = $request->input('id');
        $financeur_type->libelle = $request->input('libelle');

        $financeur_type->save();

        return response()->json($financeur_type);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DomaineFormation::destroy($id);
    }
}
