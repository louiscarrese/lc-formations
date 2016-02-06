<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DemiJours extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('modules', function($table) {
            $table->time('heure_debut')->nullable()->change();
            $table->time('heure_fin')->nullable()->change();
            $table->renameColumn('heure_debut', 'heure_debut_matin');
            $table->renameColumn('heure_fin', 'heure_fin_apresmidi');
            $table->time('heure_fin_matin')->nullable();
            $table->time('heure_debut_apresmidi')->nullable();
        });

        Schema::table('session_jours', function($table) {
            $table->time('heure_debut')->nullable()->change();
            $table->time('heure_fin')->nullable()->change();
            $table->renameColumn('heure_debut', 'heure_debut_matin');
            $table->renameColumn('heure_fin', 'heure_fin_apresmidi');
            $table->time('heure_fin_matin')->nullable();
            $table->time('heure_debut_apresmidi')->nullable();
        });

        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('modules', function($table) {
            $table->renameColumn('heure_debut_matin', 'heure_debut');
            $table->renameColumn('heure_fin_apresmidi', 'heure_fin');
            $table->dropColumn('heure_fin_matin');
            $table->dropColumn('heure_debut_apresmidi');
        });
        Schema::table('session_jours', function($table) {
            $table->renameColumn('heure_debut_matin', 'heure_debut');
            $table->renameColumn('heure_fin_apresmidi', 'heure_fin');
            $table->dropColumn('heure_fin_matin');
            $table->dropColumn('heure_debut_apresmidi');
        });   }
}
