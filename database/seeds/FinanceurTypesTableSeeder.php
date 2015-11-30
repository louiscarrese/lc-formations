<?php

use Illuminate\Database\Seeder;
use ModuleFormation\FinanceurType;

class FinanceurTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type_perso = new FinanceurType(array('libelle' => 'Personnel'));
        $type_perso->save();

        $type_employeur = new FinanceurType(array('libelle' => 'Employeur'));
        $type_employeur->save();

        $type_opca = new FinanceurType(array('libelle' => 'OPCA'));
        $type_opca->save();



        //TODO: Ajouter les types de financeurs publics ? -> cf. Cerfa
    }
}
