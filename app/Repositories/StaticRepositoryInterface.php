<?php 

namespace ModuleFormation\Repositories;

interface StaticRepositoryInterface {

    public function getAll(); 

    public function find($id);

}