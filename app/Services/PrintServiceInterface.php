<?php

namespace ModuleFormation\Services;

use ModuleFormations\Repositories\InscriptionRepositoryInterface;

interface PrintServiceInterface {

    public function prepareContratParameters($inscription_id);
    public function prepareEmargementParameters($session);
    public function prepareSuiviSessionParameters($session);
    
    public function getSessionLibelleForTitle($session);
    public function getLibelleForContrat($inscription);
}