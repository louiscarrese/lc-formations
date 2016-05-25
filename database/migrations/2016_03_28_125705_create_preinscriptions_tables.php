<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreinscriptionsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('preinscriptions', function(Blueprint $table) {
            $table->increments('id');

            $table->string('genre');
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_naissance')->nullable();
            $table->string('adresse', 2000)->nullable();
            $table->string('code_postal')->nullable();
            $table->string('ville')->nullable();
            $table->string('tel_fixe')->nullable();
            $table->string('tel_portable')->nullable();
            $table->string('email');
            $table->string('adherent');
            $table->string('statut');
            $table->string('salarie_type')->nullable();
            $table->string('demandeur_emploi_type')->nullable();
            $table->string('etudiant_etudes')->nullable();
            $table->string('type_autre')->nullable();
            $table->string('profession', 2000)->nullable();
            $table->string('experiences', 2000)->nullable();
            $table->string('suggestions', 2000)->nullable();
            $table->string('formations_precedentes', 2000)->nullable();

            $table->integer('stagiaire_id')->unsigned()->nullable();
            $table->foreign('stagiaire_id')->references('id')->on('stagiaires');

            $table->timestamps();
        });

        Schema::create('preinscription_sessions', function(Blueprint $table) {
            $table->increments('id');

            $table->string('financement');
            $table->string('financement_employeur_nom_structure')->nullable();
            $table->string('financement_employeur_secteur_activite')->nullable();
            $table->string('financement_employeur_signataire')->nullable();
            $table->string('financement_employeur_adresse', 2000)->nullable();
            $table->string('financement_employeur_code_postal')->nullable();
            $table->string('financement_employeur_ville')->nullable();
            $table->string('financement_employeur_tel')->nullable();
            $table->string('financement_employeur_email')->nullable();
            $table->string('financement_employeur_siret')->nullable();
            $table->string('financement_employeur_naf')->nullable();
            $table->integer('financement_employeur_effectif')->nullable();
            $table->string('financement_afdas_intermittent')->nullable();
            $table->string('financement_autre')->nullable();
            $table->string('attentes');

            $table->integer('preinscription_id')->unsigned();
            $table->foreign('preinscription_id')->references('id')->on('preinscriptions')->onDelete('cascade');

            $table->integer('tarif_id')->unsigned();
            $table->foreign('tarif_id')->references('id')->on('tarifs');

            $table->integer('session_id')->unsigned();
            $table->foreign('session_id')->references('id')->on('sessions');

            $table->integer('employeur_id')->unsigned()->nullable();
            $table->foreign('employeur_id')->references('id')->on('employeurs');

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
        Schema::drop('preinscription_sessions');
        Schema::drop('preinscriptions');
    }
}
