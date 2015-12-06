<?php

namespace ModuleFormation\Http\Controllers\Api;

use Illuminate\Http\Request;
use ModuleFormation\Http\Requests;
use ModuleFormation\Http\Controllers\Controller;
use ModuleFormation\FormateurType;
class FormateurTypeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->acceptsJson()) {
            $formateur_types = FormateurType::all();
            return response()->json($formateur_types);
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
        $formateur_type = new FormateurType;
        $formateur_type->id = $request->input('id');
        $formateur_type->libelle = $request->input('libelle');
        $formateur_type->save();

        return $response()->json($formateur_type);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $formateur_type = FormateurType::findOrFail($id);
        return response()->json($formateur_type);
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
        $formateur_type = FormateurType::findOrFail($id);

        $formateur_type->id = $request->input('id');
        $formateur_type->libelle = $request->input('libelle');

        $formateur_type->save();

        return response()->json($formateur_type);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FormateurType::destroy($id);
    }
}
