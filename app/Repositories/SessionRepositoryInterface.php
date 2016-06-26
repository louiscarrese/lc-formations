<?php 

namespace ModuleFormation\Repositories;

interface SessionRepositoryInterface extends RepositoryInterface {
    public function generateFormateursMail($session_id);    

}