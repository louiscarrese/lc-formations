<?php

namespace ModuleFormation\Http\Controllers;
use Log;

use Illuminate\Http\Request;
use ModuleFormation\Http\Requests;
use ModuleFormation\Http\Controllers\Controller;

class StagiairesController extends Controller
{

    public function index() {
        return view('stagiaires');
    }

    public function create(Request $request) {
        return view('stagiaire', ['mode' => 'create']);
    }

    public function show($id) {
        return view('stagiaire', ['mode' => 'edit', 'id' => $id]);

    }

}