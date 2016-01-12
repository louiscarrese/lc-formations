<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelle');
            $table->integer('nb_jours')->nullable(); 
            $table->time('heure_debut')->nullable();
            $table->time('heure_fin')->nullable();
            $table->integer('effectif_max')->nullable();
            $table->string('objectifs_pedagogiques')->nullable();
            $table->string('materiel')->nullable();

            $table->integer('lieu_id')->unsigned()->nullable();
            $table->foreign('lieu_id')->references('id')->on('lieus');

            $table->integer('domaine_formation_id')->unsigned();
            $table->foreign('domaine_formation_id')->references('id')->on('domaine_formations');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('modules');
    }
}
