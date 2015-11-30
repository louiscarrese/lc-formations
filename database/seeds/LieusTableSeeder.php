<?php

use Illuminate\Database\Seeder;
use ModuleFormation\Lieu;

class LieusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $salle_formation = new Lieu(array('libelle' => 'Salle de formation'));
        $salle_formation->save();

        $salle_concert = new Lieu(array('libelle' => 'Salle de concert'));
        $salle_concert->save();

        $exterieur = new Lieu(array('libelle' => 'Exterieur'));
        $exterieur->save();
    }
}
