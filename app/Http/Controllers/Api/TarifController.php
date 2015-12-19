<?php

namespace ModuleFormation\Http\Controllers\Api;
use Log;
use ModuleFormation\Tarif;
use Illuminate\Http\Request;
use ModuleFormation\Http\Requests;
use ModuleFormation\Http\Controllers\Controller;

class TarifController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Initialize the request
        $tarifs_req = \ModuleFormation\Tarif::with('tarif_type');

        //Add parameters if any
        if($request->input('module_id')) {
            $tarifs_req = $tarifs_req->where('module_id', $request->input('module_id'));
        }

        //Execute request
        $tarifs = $tarifs_req->get();


        return response()->json($tarifs);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tarifs = new \ModuleFormation\Tarif;
        $tarifs->module_id = $request->input('module_id');
        $tarifs->tarif_type_id = $request->input('tarif_type_id');
        $tarifs->montant = $request->input('montant');

        $tarifs->save();

        $tarifs = \ModuleFormation\Tarif::with('tarif_type')->findOrFail($tarifs->id);

        return response()->json($tarifs);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tarifs = \ModuleFormation\Tarif::with('tarif_type')->findOrFail($id);
        return response()->json($tarifs);
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
        $tarifs = \ModuleFormation\Tarif::findOrFail($id);

        $tarifs->module_id = $request->input('module_id');
        $tarifs->tarif_type_id = $request->input('tarif_type_id');
        $tarifs->montant = $request->input('montant');

        $tarifs->save();

        //Get it again, so we auto-update linked objects 
        $tarifs = \ModuleFormation\Tarif::with('tarif_type')->findOrFail($tarifs->id);

        return response()->json($tarifs);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \ModuleFormation\Tarif::destroy($id);
    }
}
