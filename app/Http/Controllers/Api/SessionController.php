<?php

namespace ModuleFormation\Http\Controllers\Api;

use Log;
use DB;
use Illuminate\Http\Request;
use ModuleFormation\Http\Requests;
use ModuleFormation\Http\Controllers\Controller;

class SessionController extends Controller
{


    public function index(Request $request) 
    {
        $sessions = \ModuleFormation\Session::all();

        return response()->json($sessions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $moduleId)
    {

        DB::beginTransaction();

        $session = new \ModuleFormation\Session;
        $session->libelle = $request->input('libelle');
        $session->nb_heures = $request->input('nb_heures');
        $session->nb_jours = $request->input('nb_jours');

        $module = \ModuleFormation\Module::findOrFail($moduleId);
        $module->sessions()->save($session);


        $jour_index = 0;
        while($request->has('jours.' . $jour_index . '.date')) {
            $jour_input = 'jours.' . $jour_index . '.';
            $jour = new \ModuleFormation\SessionJour;
            $jour->date = $request->input($jour_input . 'date');
            $jour->lieu = $request->input($jour_input . 'lieu');
            $jour->heure_debut = $request->input($jour_input . 'heure_debut');
            $jour->heure_fin = $request->input($jour_input . 'heure_fin');

            $session->session_jours()->save($jour);
        }

        DB::commit();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($moduleId, $sessionId)
    {
        $session = \ModuleFormation\Session::with('session_jours')->findOrFail($sessionId);
        return response()->json($session);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sessionId, $moduleId)
    {
        $session = \ModuleFormation\Session::findOrFail($sessionId);

        $session->libelle = $request->input('libelle');
        $session->nb_heures = $request->input('nb_heures');
        $session->nb_jours = $request->input('nb_jours');

        $session->session_jours()->delete();

        $jours = array();
        $jour_index = 0;
        while($request->has('jours.' . $jour_index . '.date')) {
            $jour_input = 'jours.' . $jour_index . '.';
            $jour = new \ModuleFormation\SessionJour;
            $jour->date = $request->input($jour_input . 'date');
            $jour->date = $request->input($jour_input . 'lieu');
            $jour->heure_debut = $request->input($jour_input . 'heure_debut');
            $jour->heure_fin = $request->input($jour_input . 'heure_fin');

            $jours[] = $jour;

            $jour_index++;
        }

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
