<?php

namespace ModuleFormation;

class Parametre extends AbstractModel
{
    //
    protected $fillable = ['key', 'value'];

    public $searchable = ['key', 'value'];
}
