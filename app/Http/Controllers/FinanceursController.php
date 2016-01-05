<?php

namespace ModuleFormation\Http\Controllers;
use Log;

use Illuminate\Http\Request;
use ModuleFormation\Http\Requests;
use ModuleFormation\Http\Controllers\Controller;

class FinanceursController extends Controller
{

    public function index() {
        return view('financeurs');
    }

    public function create(Request $request) {
        return view('financeur', ['mode' => 'create']);
    }

    public function show($id) {
        return view('financeur', ['mode' => 'edit', 'id' => $id]);

    }
}