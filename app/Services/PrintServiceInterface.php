<?php

namespace ModuleFormation\Services;

use ModuleFormations\Repositories\InscriptionRepositoryInterface;

interface PrintServiceInterface {

    public function prepareContratParameters($inscription_id);
}