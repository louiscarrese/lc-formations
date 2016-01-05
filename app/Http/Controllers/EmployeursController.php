<?php

namespace ModuleFormation\Http\Controllers;
use Log;

use Illuminate\Http\Request;
use ModuleFormation\Http\Requests;
use ModuleFormation\Http\Controllers\Controller;

class EmployeursController extends Controller
{

    public function index() {
        return view('employeurs');
    }

    public function create(Request $request) {
        return view('employeur', ['mode' => 'create']);
    }

    public function show($id) {
        return view('employeur', ['mode' => 'edit', 'id' => $id]);

    }
}