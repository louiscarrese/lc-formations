<?php

namespace ModuleFormation\Http\Controllers;
use Log;

use Illuminate\Http\Request;
use ModuleFormation\Http\Requests;
use ModuleFormation\Http\Controllers\Controller;

class IndexController extends Controller
{

    public function index() {
        return view('home');
    }
}