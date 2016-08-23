<?php

namespace ModuleFormation\Http\Controllers\Api;

use Illuminate\Http\Request;

use ModuleFormation\Http\Controllers\Controller;
use Log;

abstract class AbstractController extends Controller 
{
    protected $repository;

    //The list of possible filters
    protected $filters = [];

    protected $validation_rules = [];

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
        $this->validate($request, $this->validation_rules);

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
        $data = $this->repository->find($id, false);

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
        $this->validate($request, $this->validation_rules);

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

    /**
     * Return resources matching the specified criteria.
     * 
     * @param string $criteria the criteria to search for in all "searchable" fields.
     * @return objects matching the criteria as a JSON string.
     */
    public function search(Request $request)
    {
        $criteriasString = $request->input('criterias');
        $criterias = null;
        if($criteriasString) {
            $criterias = explode(',', $criteriasString);
        }
        
        $queryString = $request->input('query');
        $query = explode(' ', $queryString);

        $data = $this->repository->search($query, $criterias);

        return response()->json($data);
    }

}