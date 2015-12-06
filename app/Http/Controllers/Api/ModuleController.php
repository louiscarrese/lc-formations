<?php

namespace ModuleFormation\Http\Controllers\Api;
use Log;
use ModuleFormation\Module;
use Illuminate\Http\Request;
use ModuleFormation\Http\Requests;
use ModuleFormation\Http\Controllers\Controller;

class ModuleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $modules = \ModuleFormation\Module::all();
        return response()->json($modules);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $module = new \ModuleFormation\Module;
        $module->libelle = $request->input('libelle');
        $module->nb_jours = $request->input('nb_jours');
        $module->heure_debut = $request->input('heure_debut');
        $module->heure_fin = $request->input('heure_fin');
        $module->effectif_max = $request->input('effectif_max');
        $module->objectifs_pedagogiques = $request->input('objectifs_pedagogiques');
        $module->materiel = $request->input('materiel');
        $module->domaine_formation_id = $request->input('domaine_formation_id');



        $module->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $module = \ModuleFormation\Module::findOrFail($id);
        return response()->json($module);
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

        $module = \ModuleFormation\Module::findOrFail($id);

        $module->id = $request->input('id');
        $module->libelle = $request->input('libelle');
        $module->nb_jours = $request->input('nb_jours');
        $module->heure_debut = $request->input('heure_debut');
        $module->heure_fin = $request->input('heure_fin');
        $module->effectif_max = $request->input('effectif_max');
        $module->objectifs_pedagogiques = $request->input('objectifs_pedagogiques');
        $module->materiel = $request->input('materiel');
        $module->domaine_formation_id = $request->input('domaine_formation_id');

        $module->save();

        return response()->json($request);
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
        //
    }
}
