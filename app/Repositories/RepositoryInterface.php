<?php 

namespace ModuleFormation\Repositories;
/**
 * RepositoryInterface provides the standard functions to be expected of ANY 
 * repository.
 */
interface RepositoryInterface {
    /*
    public function create(array $attributes);
    public function update(array $attributes);
    public function with($relations);
    public function all($columns = array('*'));
    public function find($id, $columns = array('*'));
    public function destroy($ids);
    */
    public function getAll(); 

    public function find($id);

    public function store($data, $id = null);

    public function destroy($id);
}