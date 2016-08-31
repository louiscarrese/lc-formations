<?php 

namespace ModuleFormation\Repositories;

interface ParametreRepositoryInterface {
    /** Parameters formating interfaces */
    public function responsableFormation();
    public function debutSaison();
    public function paginationThreshold();

    /** CRUD */
    //Very close to RepositoryInterface (no findBy)
    public function find($id);
    public function getAll();
    public function store($data);
    public function destroy($id);
}