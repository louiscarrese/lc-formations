<?php

namespace ModuleFormation\Services;

interface MailGeneratorServiceInterface {

    public function infosStagiairesToFormateur($session);
    public function participants($session);
    public function formateursActifs($formateurs);
}
