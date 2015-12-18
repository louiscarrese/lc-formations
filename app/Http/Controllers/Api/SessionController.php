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
        //Initialize the request
        $sessions_req = \ModuleFormation\Session::with('module');

        //Add parameters if any
        if($request->input('module_id')) {
            $sessions_req = $sessions_req->where('module_id', $request->input('module_id'));
        }

        //Execute request
        $sessions = $sessions_req->get();


        return response()->json($sessions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $session = new \ModuleFormation\Session;
        $session->libelle = $request->input('libelle');
        $session->nb_jours = $request->input('nb_jours');
        $session->effectif_max = $request->input('effectif_max');
        $session->objectifs_pedagogiques = $request->input('objectifs_pedagogiques');
        $session->materiel = $request->input('materiel');
        $session->module_id = $request->input('module_id');

        $session->save();

        //Regrab it with its module
        $session = \ModuleFormation\Session::with('module')->findOrFail($session->id);
        return response()->json($session);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($sessionId)
    {
        $session = \ModuleFormation\Session::with('module')->findOrFail($sessionId);
        return response()->json($session);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sessionId)
    {
        $session = \ModuleFormation\Session::findOrFail($sessionId);

        $session->libelle = $request->input('libelle');
        $session->nb_jours = $request->input('nb_jours');
        $session->effectif_max = $request->input('effectif_max');
        $session->objectifs_pedagogiques = $request->input('objectifs_pedagogiques');
        $session->materiel = $request->input('materiel');
        $session->module_id = $request->input('module_id');

        $session->save();

        //Regrab it with its module
        $session = \ModuleFormation\Session::with('module')->findOrFail($sessionId);
        return response()->json($session);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \ModuleFormation\Session::destroy($id);

    }
}
