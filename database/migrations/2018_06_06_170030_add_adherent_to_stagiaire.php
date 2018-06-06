<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdherentToStagiaire extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stagiaires', function($table) {
	    $table->string('adherent')->default('Adhérent');
	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stagiaires', function($table) {
	    $table->dropColumn('adherent');
	});
    }
}
