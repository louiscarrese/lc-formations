<?php

use Illuminate\Database\Seeder;
use ModuleFormation\DomaineFormation;

class DomaineFormationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $domaine_technique = new DomaineFormation(array('libelle' => 'Technique'));
        $domaine_technique->save();
        $domaine_technique = new DomaineFormation(array('libelle' => 'Administratif'));
        $domaine_technique->save();
        $domaine_technique = new DomaineFormation(array('libelle' => 'Technico-artistique'));
        $domaine_technique->save();
        $domaine_technique = new DomaineFormation(array('libelle' => 'Atelier'));
        $domaine_technique->save();



    }
}
