<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStagiairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stagiaires', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nom');
            $table->string('prenom');
            $table->string('sexe');
            $table->date('date_naissance');
            $table->string('adresse');
            $table->string('code_postal');
            $table->string('ville');
            $table->string('tel_portable');
            $table->string('tel_fixe');
            $table->string('email');
            $table->string('profession');
            $table->string('etudes');
            $table->date('demandeur_emploi_depuis');
            $table->string('niveau_qualification'); //liste fermée ?
            $table->string('domaine_pro'); //liste fermée ?

            $table->integer('employeur_id')->unsigned()->nullable();
            $table->foreign('employeur_id')->references('id')->on('modules');

            $table->integer('stagiaire_type_id')->unsigned();
            $table->foreign('stagiaire_type_id')->references('id')->on('stagiaire_types');

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
        Schema::drop('stagiaires');
    }
}
