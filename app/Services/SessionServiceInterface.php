<?php

namespace ModuleFormation\Services;

interface SessionServiceInterface {
    public function getMinMaxDates($sessionId);

    public function getNbInscriptionsByStatut($sessionId);
}