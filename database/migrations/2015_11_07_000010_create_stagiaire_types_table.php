<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStagiaireTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stagiaire_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelle');
            $table->boolean('is_salarie')->default(false);
            $table->boolean('is_fonctionnaire')->default(false);
            $table->boolean('is_demandeur_emploi')->default(false);
            $table->boolean('is_contrat_pro')->default(false);
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
        Schema::drop('stagiaire_types');
    }
}
