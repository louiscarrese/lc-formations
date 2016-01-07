<?php 
namespace ModuleFormation\Repositories;

abstract class AbstractRepository implements RepositoryInterface {
    
    protected $modelClassName;

    protected $model;

    /**
     * This method should map an array of data to a model object.
     * $seed may contain an initial object already filled (to be updated).
     */
    protected abstract function toModel($data, $seed = null);

    /**
     * This method will be called on each object returned and should be 
     * overloaded to add computed data to objects.
     */
    protected function augmentData($data) {}

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
     * Create or update (if an id is provided) an object from an array of data.
     */
    public function store($data, $id = null) {

        //If it's an update, get the existing object
        $existing = null;
        if($id != null) {
            $existing = $this->model->findOrFail($id);
        } 

        //Build the object
        $object = $this->toModel($data, $existing);

        //store the object
        $object->save();

        $data = $this->augmentData($object);
        return $data;
    }

    /**
     * Delete an object by its id.
     */
    public function destroy($id) {
        return $this->model->destroy($id);
    }
}
