<?php

namespace ModuleFormation\Http\Controllers;
use Log;

use Illuminate\Http\Request;
use ModuleFormation\Http\Requests;
use ModuleFormation\Http\Controllers\Controller;

class ModulesController extends Controller
{

    public function index() {
        return view('modules');
    }

    public function create(Request $request) {
        return view('module', ['mode' => 'create']);
    }

    public function show($id) {
        return view('module', ['mode' => 'edit', 'id' => $id]);

    }
}