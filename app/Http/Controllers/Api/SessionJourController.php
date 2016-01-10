<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\SessionJourRepositoryInterface;

class SessionJourController extends AbstractController
{
    protected $validation_rules = [
        'date' => 'required|date_format:Y-m-d\TH:i:s.u\Z',
        'heure_debut' => 'required|date_format:Y-m-d\TH:i:s.u\Z',
        'heure_fin' => 'required|date_format:Y-m-d\TH:i:s.u\Z',
        'session_id' => 'required',
        'lieu_id' => 'required',
    ];

    public function __construct(SessionJourRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
