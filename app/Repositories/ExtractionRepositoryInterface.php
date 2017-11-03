<?php

namespace ModuleFormation\Repositories;

interface ExtractionRepositoryInterface {
    public function getByDomaineFormation($min_date, $max_date);
    public function getByModule($min_date, $max_date);
}
