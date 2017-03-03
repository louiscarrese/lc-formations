<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use ModuleFormation\Parametre;

class InsertFinSaisonParameter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	$seasonEnd = new Parametre();
	$seasonEnd->key = 'fin_saison';
	$seasonEnd->value = '31/08/2016';
	$seasonEnd->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
