<?php

namespace ModuleFormation;

class Lieu extends AbstractModel
{
    //
    protected $fillable = ['id', 'libelle'];

    public $searchable = ['libelle'];
}
