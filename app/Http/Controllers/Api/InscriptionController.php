<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\InscriptionRepositoryInterface;

class InscriptionController extends AbstractController
{
    protected $filters = ['stagiaire_id' => 'stagiaire_id'];

    protected $validation_rules = [
        'stagiaire_id' => 'required',
        'session_id' => 'required',
    ];

    public function __construct(InscriptionRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function validateInscription($id) 
    {
        $this->repository->validate($id);
    }

    public function cancelInscription($id) 
    {
        $this->repository->cancel($id);
    }

    public function withdrawInscription($id) 
    {
        $this->repository->withdraw($id);
    }
}
