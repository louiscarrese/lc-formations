<?php 
namespace ModuleFormation\Repositories;

abstract class AbstractRepository implements RepositoryInterface {
    
    protected $modelClassName;

    protected $model;

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
                foreach($data[$subObjectDefinition['data_id']] as $subObjectData) {
                    //Call the repository to augment it
                    $subObjectDefinition['repository']->augmentData($subObjectData);
                }
            }
        }

        return $data;
    }

    /**
     * This method will be called on each incoming object and should be 
     * overloaded to process data coming from the front end.
     */
    protected function processIncomingData($data) {return $data;}

    public function __construct($app)
    {
        $this->model = $app->make($this->modelClassName);
    }

    /**
     * Retrieve all the objects from the database.
     */
    public function getAll() {
        $datas = $this->model->get();

        foreach($datas as $data) {
            $data = $this->augmentData($data);
        }

        return $datas;
    }

    /**
     * Get an object from the database by its id.
     */
    public function find($id) {
        $data = $this->model->findOrFail($id);
        $data = $this->augmentData($data);
        return $data;
    }

    /**
     * Select resource based on criterias.
     */
    public function findBy($criterias) 
    {
        //Start with the base model
        $data_req = $this->model;

        //Add each criteria
        foreach($criterias as $key => $value) {
            if(is_array($value)) {
                $data_req = $data_req->whereIn($key, $value);
            } else {
                $data_req = $data_req->where($key, $value);
            }
        }

        //Execute request
        $datas = $data_req->get();

        //Augment data
        foreach($datas as $data) {
            $data = $this->augmentData($data);
        }
        
        return $datas;
    }

    /**
     * Multiple strings search in selected searchable resource properties.
     */
    public function search($query, $criterias = null) {
        //Start with the base model
        $data_req = $this->model;

        $existingCriterias = array();
        if($criterias) {
            $existingCriterias = array_intersect($this->model->searchable, $criterias);
        } else {
            $existingCriterias = $this->model->searchable;
        }
        foreach($existingCriterias as $criteria) {
            foreach($query as $queryField) {
                $data_req = $data_req->orWhere($criteria, 'ilike', '%' . $queryField . '%');
            }
        }

        //Execute request
        $datas = $data_req->get();

        //Augment data
        foreach($datas as $data) {
            $data = $this->augmentData($data);
        }

        return $datas;
    }

    /**
     * Create or update (if an id is provided) an object from an array of data.
     */
    public function store($data, $id = null) {

        $data = $this->processIncomingData($data);

        //If it's an update, refill the existing object
        $object = null;
        if($id != null) {
            //TODO: handle the subobjects (no test case at this time)
            $object = $this->model->findOrFail($id);            
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
        $data = $this->find($object->id);
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

}
