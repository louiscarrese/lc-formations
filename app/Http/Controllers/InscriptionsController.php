<?php

namespace ModuleFormation\Http\Controllers;
use Log;

use Illuminate\Http\Request;
use ModuleFormation\Http\Requests;
use ModuleFormation\Http\Controllers\Controller;

class InscriptionsController extends Controller
{

    public function index() {
        return view('inscriptions');
    }

    public function create(Request $request) {
        return view('inscription', ['mode' => 'create']);
    }

    public function show($id) {
        return view('inscription', ['mode' => 'edit', 'id' => $id]);

    }
}