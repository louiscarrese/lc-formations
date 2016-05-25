<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStagiaireEmployeurFkToPreinscription extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('preinscriptions', function($table) {
            $table->integer('stagiaire_id')->unsigned()->nullable();
            $table->foreign('stagiaire_id')->references('id')->on('stagiaires');
        });

        Schema::table('preinscription_sessions', function($table) {
            $table->integer('employeur_id')->unsigned()->nullable();
            $table->foreign('employeur_id')->references('id')->on('employeurs');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('preinscriptions', function($table) {
            $table->dropColumn('stagiaire_id');
        });

        Schema::table('preinscription_sessions', function($table) {
            $table->dropColumn('employeur_id');
        });
    }
}
