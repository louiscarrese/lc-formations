<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Http\Controllers\Controller;

abstract class AbstractStaticController extends Controller {
    protected $repository;

    public function index() {
        $data = $this->repository->getAll();
        return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
    }

    public function show($id) {
        $data = $this->repository->find($id);
        return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
    }
}
