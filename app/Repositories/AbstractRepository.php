<?php 
namespace ModuleFormation\Repositories;

abstract class AbstractRepository implements RepositoryInterface {
    
    protected $modelClassName;

    protected $model;

    protected $relations = [];

    /**
     * This method will be called on each object returned and should be 
     * overloaded to add computed data to objects.
     */
    protected function augmentData($data) {return $data;}

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
     * Create or update (if an id is provided) an object from an array of data.
     */
    public function store($data, $id = null) {

        //If it's an update, refill the existing object
        $object = null;
        if($id != null) {
            $object = $this->model->findOrFail($id);
            $object->fill($data)->save();
        } else {
            //If it's a create, mass assign
            $object = $this->model->create($data);
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
