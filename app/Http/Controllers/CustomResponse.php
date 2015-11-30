<?php

namespace ModuleFormation\Http\Controllers;

class CustomResponse {
    public $count;

    public $data;

    public function __construct($data) {

        $this->data = $data;

        if(is_array($data)) {
            $this->count = count($data);
        } else {
            $this->count = 1;
        }
    }

}