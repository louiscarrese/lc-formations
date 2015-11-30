<?php

use Illuminate\Database\Seeder;
use ModuleFormation\TarifType;

class TarifTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tarif_plein = new TarifType(array('libelle' => 'Plein'));
        $tarif_plein->save();
        $tarif_reduit = new TarifType(array('libelle' => 'Reduit'));
        $tarif_reduit->save();

    }
}
