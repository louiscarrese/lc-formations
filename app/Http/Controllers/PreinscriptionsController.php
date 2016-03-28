<?php

namespace ModuleFormation\Http\Controllers;
use Log;

use Illuminate\Http\Request;
use ModuleFormation\Http\Requests;
use ModuleFormation\Http\Controllers\Controller;

class PreinscriptionsController extends Controller
{

    public function index() {
        return view('preinscriptions');
    }

    public function store(Request $request) {
        //Do the storing things


        //Display a thank you
        return view('');

    }

    public function conditions() {
        return view('preinscription_conditions');
    }
}