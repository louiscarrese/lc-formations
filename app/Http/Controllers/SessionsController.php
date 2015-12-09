<?php

namespace ModuleFormation\Http\Controllers;
use Log;

use Illuminate\Http\Request;
use ModuleFormation\Http\Requests;
use ModuleFormation\Http\Controllers\Controller;

class SessionsController extends Controller
{

    public function index() {
        return view('sessions');
    }

    public function create(Request $request) {
        return view('session', ['mode' => 'create']);
    }

    public function show($id) {
        return view('session', ['mode' => 'edit', 'id' => $id]);

    }
}