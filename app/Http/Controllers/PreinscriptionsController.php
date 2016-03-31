<?php

namespace ModuleFormation\Http\Controllers;
use Log;

use Illuminate\Http\Request;
use ModuleFormation\Http\Requests;
use ModuleFormation\Http\Controllers\Controller;

class PreinscriptionsController extends Controller
{

    /** 
     * Public part
     */
    public function publicForm() {
        return view('preinscription_publicForm');
    }

    public function thanks() {
        return view('preinscription_thanks');
    }

    public function conditions() {
        return view('preinscription_conditions');
    }

    /**
     *
     */
    public function index() {
        return view('preinscriptions');
    }

    public function show($id) {
        return view('preinscriptions', ['mode' => 'edit', 'id' => $id]);

    }
}