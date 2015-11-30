<?php

use Illuminate\Database\Seeder;
use ModuleFormation\Financeur;

class FinanceursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Les financeurs protégés doivent toujours être là. L'application en dépend.
        $financeur_perso = new Financeur(array(
            'libelle' => 'Personnel',
            'financeur_type' => 1
            ));
        $financeur_perso->save();

        $financeur_emp = new Financeur(array(
            'libelle' => 'Employeur',
            'financeur_type' => 2
            ));
        $financeur_emp->save();

        //Les financeurs non protégés sont éditables dans l'administration.
        $financeur_opca1 = new Financeur(array(
            'libelle' => 'OPCA 1',
            'financeur_type' => 3
            ));
        $financeur_opca1->save();

        //
    }
}
