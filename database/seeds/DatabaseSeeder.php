<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        //Closed List
        $this->call(DomaineFormationsTableSeeder::class);
        $this->call(FinanceurTypesTableSeeder::class);
        $this->call(FormateurTypesTableSeeder::class);
        $this->call(StagiaireTypesTableSeeder::class);
        $this->call(TarifTypesTableSeeder::class);

        //Static data
        $this->call(FinanceursTableSeeder::class);
        $this->call(LieusTableSeeder::class);

        //Test data
//        $this->call(ModulesTableSeeder::class);

        Model::reguard();
    }
}
