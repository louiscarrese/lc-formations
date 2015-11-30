<?php

use Illuminate\Database\Seeder;
use ModuleFormation\Module;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $module = new Module(array(
            'libelle' => 'module1',
            'nb_jours' => 1
            ));
        $module->save();

        $module = new Module(array(
            'libelle' => 'module2',
            'nb_jours' => 2
            ));
        $module->save();
   }
}
