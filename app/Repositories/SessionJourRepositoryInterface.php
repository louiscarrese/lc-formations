<?php 

namespace ModuleFormation\Repositories;

interface SessionJourRepositoryInterface extends RepositoryInterface {
    
    public function createDefault($session_id, $date);
}