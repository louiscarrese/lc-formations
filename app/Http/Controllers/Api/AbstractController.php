<?php

namespace ModuleFormation\Http\Controllers\Api;

use Illuminate\Http\Request;

use ModuleFormation\Http\Controllers\Controller;

abstract class AbstractController extends Controller 
{
    protected $repository;

    //The list of possible filters
    protected $filters = [];

    public function index(Request $request) 
    {
        //Initialize with no criterias
        $criterias = array();

        //If we possibly have filters
        if(count($this->filters) > 0) {
            //Check if each filter is present in the request
            foreach($this->filters as $requestKey => $dbKey) {
                if($request->input($requestKey)) {
                    //If it is, add it to the criterias
                    $criterias[$dbKey] = $request->input($requestKey);
                }
            }
        }

        //If we found criterias, findBy
        if(count($criterias) > 0) {
            $data = $this->repository->findBy($criterias);
        } else {
            //else getAll
            $data = $this->repository->getAll();
        }


        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->repository->store($request->all());

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->repository->find($id);

        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->repository->store($request->all(), $id);

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->destroy($id);
    }



}