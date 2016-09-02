<?php 
namespace ModuleFormation\Repositories;

abstract class AbstractStaticRepository implements StaticRepositoryInterface {
    protected $data = [];
    /**
     * Retrieve all the objects from the database.
     */
    public function getAll() {
        return ['data' => $this->data];
    }

    /**
     * Get an object from the database by its id.
     */
    public function find($id) {
      foreach($this->data as $item) {
	if($item['id'] == $id) 
	  return $item;
      }
      return null;
    }


}
