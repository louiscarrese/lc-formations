<?php

namespace ModuleFormation\Http\Controllers\Api;

use Illuminate\Http\Request;
use ModuleFormation\Http\Requests;
use ModuleFormation\Http\Controllers\Controller;
use ModuleFormation\TarifType;
class TarifTypeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tarif_types = TarifType::all();
        return response()->json($tarif_types);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tarif_type = new TarifType;
        $tarif_type->libelle = $request->input('libelle');
        $tarif_type->save();

        return $response()->json($tarif_type);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tarif_type = TarifType::findOrFail($id);
        return response()->json($tarif_type);
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
        $tarif_type = TarifType::findOrFail($id);

        $tarif_type->id = $request->input('id');
        $tarif_type->libelle = $request->input('libelle');

        $tarif_type->save();

        return response()->json($tarif_type);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TarifType::destroy($id);
    }
}
