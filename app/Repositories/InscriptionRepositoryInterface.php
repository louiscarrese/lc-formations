<?php 

namespace ModuleFormation\Repositories;

interface InscriptionRepositoryInterface extends RepositoryInterface {
    public function validate($id);
    public function cancel($id);

}