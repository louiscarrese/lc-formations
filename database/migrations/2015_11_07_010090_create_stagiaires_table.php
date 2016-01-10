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
            $table->string('prenom')->nullable();
            $table->string('sexe')->nullable();
            $table->date('date_naissance')->nullable();
            $table->string('adresse')->nullable();
            $table->string('code_postal')->nullable();
            $table->string('ville')->nullable();
            $table->string('tel_portable')->nullable();
            $table->string('tel_fixe')->nullable();
            $table->string('email')->nullable();
            $table->string('profession')->nullable();
            $table->string('etudes')->nullable();
            $table->date('demandeur_emploi_depuis')->nullable();
            $table->string('niveau_qualification')->nullable(); //liste fermée ?
            $table->string('domaine_pro')->nullable(); //liste fermée ?

            $table->integer('employeur_id')->unsigned()->nullable();
            $table->foreign('employeur_id')->references('id')->on('employeurs');

            $table->integer('stagiaire_type_id')->unsigned()->nullable();
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
