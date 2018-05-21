<?php 
namespace ModuleFormation\Repositories;

abstract class AbstractRepository implements RepositoryInterface {
    
    protected $modelClassName;

    protected $model;

    protected $isPaginated = false;

    protected $parametreRepository;

    protected $defaultScope = null;

    /**
     * A list of the n-n relations described like this : 
     *  'data_id' => the field in the front end data containing an array of id for the relation
     *  'relation_method' => the method in the current object describing the relation
     *  'repository' => a reference to the repository that handles the related object
     */
    protected $relations = [];

    /**
     * A list of subobjects and their repositories to be handled.
     * This is useful when the subobjects come through the same API endpoint.
     * subobjects are described like this : 
     *  'data_id' => the field containing the list of sub objects
     *  'repository' => a reference to the repository that handles the sub object
     *  'parent_key' => the field of the database subobject containing the parent key to set
     */
    protected $subObjects = [];

    /**
     * This method will be called on each object returned and should be 
     * overloaded to add computed data to objects.
     */
    protected function augmentData($data) {
        //For each of the declared sub objects
        foreach($this->subObjects as $subObjectDefinition) {
            //For each instance of the sub object found in the data
            if(isset($data[$subObjectDefinition['data_id']])) {
                //Call the repository to augment it
                $subObjectDefinition['repository']->augmentData($data[$subObjectDefinition['data_id']]);
            }
        }

        return $data;
    }

    protected function augmentListData($data) { 
        //For each of the declared sub objects
        foreach($this->subObjects as $subObjectDefinition) {
            //For each instance of the sub object found in the data
            if(isset($data[$subObjectDefinition['data_id']])) {
                //Call the repository to augment it
                $subObjectDefinition['repository']->augmentListData($data[$subObjectDefinition['data_id']]);
            }
        }

        return $data; 
    }

    /**
     * This method will be called on each incoming object and should be 
     * overloaded to process data coming from the front end.
     */
    protected function processIncomingData($data) {return $data;}

    /**
     * This method will be called after an update of an object.
     * It should be overloaded to trigger additional update logic.
     */
    protected function afterUpdate($previousObject, $newObject) {return;}

    public function __construct($app)
    {
        $this->model = $app->make($this->modelClassName);
        $this->parametreRepository = $app->make('ModuleFormation\Repositories\ParametreRepositoryInterface');
    }

    public function model() {
        return $this->model;
    }

    /**
     * Retrieve all the objects from the database.
     */
    public function getAll($scope = null, $forceNoPaginate = false) {
        $datas = array();

        //If there is no scope available or we are told not to use it
        if($scope === false || ($scope === null && $this->defaultScope === null)) {
            $req = $this->model;
        } else { //$scope !== false && ($scope !== null || $this->defaultScope !== null)
            //If a scope has been provided, use it
            if($scope !== null) {
                $req = $this->model->{$scope}();
            } else {
                //Use the default scope
                $req = $this->model->{$this->defaultScope}();
            }
        }

        //Pagination
        if($this->isPaginated && !$forceNoPaginate) {
            $datas = $req->paginate($this->parametreRepository->paginationThreshold());

            foreach($datas as $data) {
                $data = $this->augmentListData($data);
            }
        } else {
            $datas = ['data' => $req->get()];

            foreach($datas['data'] as $data) {
                $data = $this->augmentListData($data);
            }
        }

        return $datas;
    }

    /**
     * Get an object from the database by its id.
     * $scope : null => use default scope
     *          false => use no scope
     *          <string> => use <string> scope
     */
    public function find($id, $scope = null) {
        $data = null;

        //If there is no scope available or we are told not to use it
        if($scope === false || ($scope === null && $this->defaultScope === null)) {
            $data = $this->model->findOrFail($id);
        } else { //$scope !== false && ($scope !== null || $this->defaultScope !== null)
            //If a scope has been provided, use it
            if($scope !== null) {
                $data = $this->model->{$scope}()->findOrFail($id);
            } else {
                //Use the default scope
                $data = $this->model->{$this->defaultScope}()->findOrFail($id);
            }
        }

        $data = $this->augmentData($data);

        return $data;
    }

    /**
     * Select resource based on criterias.
     */
    public function findBy($criterias, $scope = null) 
    {
        //Start with the base model
        $data_req = $this->model;

        //If we are not told to ignore scope and there is a scope available
        if($scope !== false && ($scope !== null || $this->defaultScope !== null)) {
            if($scope) {
                $data_req = $data_req->{$scope}();
            } else {
                $data_req = $data_req->{$this->defaultScope}();
            }

        }

        //Add each criteria
        foreach($criterias as $key => $value) {
            if(is_array($value)) {
                $data_req = $data_req->whereIn($key, $value);
            } else {
                $data_req = $data_req->where($key, $value);
            }
        }

        //Execute request
        $datas = ['data' => $data_req->get()];

        //Augment data
        foreach($datas['data'] as $data) {
            $data = $this->augmentListData($data);
        }
        
        return $datas;
    }

    /**
     * Multiple strings search in selected searchable resource properties.
     */
    public function search($query, $criterias = null, $scope = null) {
        //Start with the base model
        $data_req = $this->model;

        //If we are not told to ignore scope and there is a scope available
        if($scope !== false && ($scope !== null || $this->defaultScope !== null)) {
            if($scope) {
                $data_req = $data_req->{$scope}();
            } else {
                $data_req = $data_req->{$this->defaultScope}();
            }
        }

	//Define in which fields we are going to search
        $existingCriterias = array();
        if($criterias) {
	  //If some were given, we recoup with the searchable fields
            $existingCriterias = array_intersect($this->model->searchable, $criterias);
        } else {
	  //If none were given, we search in all the searchables
            $existingCriterias = $this->model->searchable;
        }

	$data_req = $data_req->select($this->model->getTableName() . '.*');
	//We add a big AND clause to isolate from scope issues
	$data_req = $data_req->where(function($q) use ($existingCriterias, $query, $data_req) {
	    //for each field to search
	    foreach($existingCriterias as $criteria) {
	      //for each query term
	      foreach($query as $queryField) {
		$q = $this->addSearchCriteria($q, $data_req, $criteria, $queryField);
	      }
	    }
	  });

        //Execute request
        $datas = ['data' => $data_req->get()];

        //Augment data
        foreach($datas['data'] as $data) {
            $data = $this->augmentListData($data);
        }

        return $datas;
    }

    //clause: the search clause
    //mainReq: the main request (to add joins)
    //column: the column in which we want to search
    //query: the query term
    private function addSearchCriteria($clause, $mainReq, $column, $query) {
      //split on "." to get subobjects
      $objectPath = explode('.', $column);
      
      //if there was a subobject
      if(count($objectPath) == 2) {
	$subObjectTableName = $objectPath[0] . 's';
	$subObjectField = $objectPath[1];
	
	//Add a join to the main request
	$mainReq->join($subObjectTableName, 
		   $this->model->getTableName() . '.' . $objectPath[0] . '_id', 
		   '=', 
		   $subObjectTableName . '.id');
	//Add a where to the clause
	$clause->orWhereRaw("lower(" . $subObjectTableName . "." . $subObjectField . ") like ?", array('%' . strtolower($query) . '%')); 
      } else {
	//Just add a where to the clause
	  $clause->orWhereRaw("lower(" . $this->model->getTableName() . "." . $column . ") like ?", array('%' . strtolower($query) . '%'));
      }
      return $clause;
    }

    /**
     * Create or update (if an id is provided) an object from an array of data.
     */
    public function store($data, $id = null) {
	//We store previous data to allow diffing in afterUpdate
	$previousObject = null;

        $data = $this->processIncomingData($data);

        //If it's an update, refill the existing object
        $object = null;
        if($id != null) {
            //TODO: handle the subobjects (no test case at this time)
            $object = $this->model->findOrFail($id);

	    $previousObject = clone $object;

	    $object->fill($data)->save();
        } else {
            //If it's a create, mass assign
            $object = $this->model->create($data);

            //For each of the declared sub objects
            foreach($this->subObjects as $subObjectDefinition) {
                //For each instance of the sub object found in the data
                if(isset($data[$subObjectDefinition['data_id']])) {
                    foreach($data[$subObjectDefinition['data_id']] as $subObjectData) {
                        //Put in the parent key
                        $subObjectData[$subObjectDefinition['parent_key']] = $object->id;
                        //Call the repository to store it
                        $subObjectDefinition['repository']->store($subObjectData);
                    }
                }
            }
        }

        //Build associations
        $this->reattachRelations($object, $data);

        //Refetch the object (so it updates associated data)
        $data = $this->find($object->id, false);

	//Trigger additional actions on update
	$this->afterUpdate($previousObject, $this->model->findOrFail($object->id));

        return $data;
    }

    private function reattachRelations($object, $data) {
        foreach($this->relations as $relation) {
            $relationMethod = $relation['relation_method'];
            $repository = $relation['repository'];
            $dataId = $relation['data_id'];

            $object->$relationMethod()->detach();
            if(isset($data[$dataId]) && count($data[$dataId]) > 0) {
                foreach($data[$dataId] as $id) {
                    $relationObject = $repository->find($id);
                    $object->$relationMethod()->save($relationObject);
                }
            }
        }
    }

    /**
     * Delete an object by its id.
     */
    public function destroy($id) {
        return $this->model->destroy($id);
    }

    private function resolveScope($scope, $defaultScope) {
        return ($scope === null) ? $defaultScope : $scope;
    }

}
