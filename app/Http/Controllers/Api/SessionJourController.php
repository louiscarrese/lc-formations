<?php

namespace ModuleFormation\Http\Controllers\Api;

use ModuleFormation\Repositories\SessionJourRepositoryInterface;
use Illuminate\Http\Request;

class SessionJourController extends AbstractController
{
    protected $filters = ['session_id' => 'session_id'];

    protected $validation_rules = [
        'date' => 'required|date_format:Y-m-d\TH:i:s.u\Z',
        'heure_debut' => 'required|date_format:H:i',
        'heure_fin' => 'required|date_format:H:i',
        'session_id' => 'required',
        'lieu_id' => 'required',
    ];

    public function __construct(SessionJourRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function createDefault(Request $request) 
    {
        $session_id = $request->input('session_id');
        $date = $request->input('base_date');
        $this->repository->createDefault($session_id, $date);
    }

}
