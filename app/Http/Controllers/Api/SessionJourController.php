<?php

namespace ModuleFormation\Http\Controllers\Api;
use Log;
use ModuleFormation\SessionJour;
use Illuminate\Http\Request;
use ModuleFormation\Http\Requests;
use ModuleFormation\Http\Controllers\Controller;

class SessionJourController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Initialize the request
        $session_jours_req = \ModuleFormation\SessionJour::with('lieu', 'formateurs');

        //Add parameters if any
        if($request->input('session_id')) {
            $session_jours_req = $session_jours_req->where('session_id', $request->input('session_id'));
        }

        //Execute request
        $session_jours = $session_jours_req->get();


        return response()->json($session_jours);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $session_jours = new \ModuleFormation\SessionJour;
        $session_jours->date = $request->input('date');
        $session_jours->heure_debut = $request->input('heure_debut');
        $session_jours->heure_fin = $request->input('heure_fin');

        $session_jours->lieu_id = $request->input('lieu_id');
        $session_jours->session_id = $request->input('session_id');

        $session_jours->save();

        foreach($request->input('formateurs_id') as $formateur_id) {
            $formateur = \ModuleFormation\Formateur::findOrFail($formateur_id);
            $session_jours->formateurs()->save($formateur);
        }


        $session_jours = \ModuleFormation\SessionJour::with('lieu', 'formateurs')->findOrFail($session_jours->id);

        return response()->json($session_jours);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $session_jours = \ModuleFormation\SessionJour::with('lieu', 'formateurs')->findOrFail($id);
        return response()->json($session_jours);
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
        $session_jours = \ModuleFormation\SessionJour::findOrFail($id);

        $session_jours->id = $request->input('id');
        $session_jours->date = $request->input('date');
        $session_jours->heure_debut = $request->input('heure_debut');
        $session_jours->heure_fin = $request->input('heure_fin');

        $session_jours->lieu_id = $request->input('lieu_id');

        $session_jours->save();

        $session_jours->formateurs()->detach();
        foreach($request->input('formateurs_id') as $formateur_id) {
            $formateur = \ModuleFormation\Formateur::findOrFail($formateur_id);
            $session_jours->formateurs()->save($formateur);
        }

        //Get it again, so we auto-update linked objects 
        $session_jours = \ModuleFormation\SessionJour::with('lieu', 'formateurs')->findOrFail($request->input('id'));

        return response()->json($session_jours);
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
        \ModuleFormation\SessionJour::findOrFail($id)->formateurs()->detach();
        \ModuleFormation\SessionJour::destroy($id);
    }
}
