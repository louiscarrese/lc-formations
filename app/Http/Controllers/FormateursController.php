<?php

namespace ModuleFormation\Http\Controllers;
use Log;

use Illuminate\Http\Request;
use ModuleFormation\Http\Requests;
use ModuleFormation\Http\Controllers\Controller;

class FormateursController extends Controller
{

    public function index() {
        return view('formateurs');
    }

    public function create(Request $request) {
        return view('formateur', ['mode' => 'create']);
    }

    public function show($id) {
        return view('formateur', ['mode' => 'edit', 'id' => $id]);

    }
}