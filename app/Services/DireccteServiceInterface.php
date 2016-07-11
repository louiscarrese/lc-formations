<?php 

namespace ModuleFormation\Services;

interface DireccteServiceInterface {
    public function G_D($date_min, $date_max);
    public function BF($date_min, $date_max);
    public function BP($date_min, $date_max);

}