<?php

namespace ModuleFormation\Http\Controllers\Api;

use Log;
use DB;
use Illuminate\Http\Request;
use ModuleFormation\Http\Requests;
use ModuleFormation\Http\Controllers\Controller;
use ModuleFormation\Repositories\InscriptionRepositoryInterface;

class InscriptionController extends Controller
{
    public function __construct(InscriptionRepositoryInterface $inscription)
    {
        $this->inscriptionRepository = $inscription;
    }

    public function index(Request $request) 
    {
        $inscriptions = $this->inscriptionRepository->getAll();
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
        $inscription = $this->inscriptionRepository->store($this->extractData($request));

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
        $inscription = $this->inscriptionRepository->find($inscriptionId);

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
        $inscription = $this->inscriptionRepository->store($this->extractData($request), $inscriptionId);

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
        $this->inscriptionRepository->destroy($id);
    }

    private function extractData($request) 
    {
        //TODO: input validation
        $ret['id'] = $request->input('id');
        $ret['profession_structure'] = $request->input('profession_structure');
        $ret['experiences'] = $request->input('experiences');
        $ret['attentes'] = $request->input('attentes');
        $ret['suggestions'] = $request->input('suggestions');
        $ret['formations_precedentes'] = $request->input('formations_precedentes');
        $ret['stagiaire_id'] = $request->input('stagiaire_id');
        $ret['session_id'] = $request->input('session_id');

        return $ret;
    }
}
