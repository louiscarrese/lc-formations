<?php

use Illuminate\Database\Seeder;
use ModuleFormation\FormateurType;


class FormateurTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Référence : Cerfa 10443-12, Page 1, Section D

        $independant = new FormateurType(array('id' => 1, 'libelle' => 'Travailleur indépendant'));
        $independant->save();

        $cdi = new FormateurType(array('id' => 2, 'libelle' => 'Salarié CDI'));
        $cdi->save();

        $cdd = new FormateurType(array('id' => 3, 'libelle' => 'Salarié CDD'));
        $cdd->save();

        $occasionnel = new FormateurType(array('id' => 4, 'libelle' => 'Formateur occasionnel'));
        $occasionnel->save();

        $benevole = new FormateurType(array('id' => 5, 'libelle' => 'Bénévole'));
        $benevole->save();

        $soustraitant = new FormateurType(array('id' => 6, 'libelle' => 'Sous traitant'));
        $soustraitant->save();
    }
}
