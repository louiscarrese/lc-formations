<?php 
namespace ModuleFormation\Repositories;

abstract class AbstractStaticRepository implements StaticRepositoryInterface {
    protected $data = [];
    /**
     * Retrieve all the objects from the database.
     */
    public function getAll() {
        return $this->data;
    }

    /**
     * Get an object from the database by its id.
     */
    public function find($id) {
        return $this->data[$id];
    }


}
