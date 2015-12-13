<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formateurs', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('sexe')->nullable();
            $table->date('date_naissance')->nullable();
            $table->string('adresse')->nullable();
            $table->string('code_postal')->nullable();
            $table->string('ville')->nullable();
            $table->string('tel_portable')->nullable();
            $table->string('tel_fixe')->nullable();
            $table->string('email')->nullable();

            $table->integer('formateur_type_id')->unsigned();
            $table->foreign('formateur_type_id')->references('id')->on('formateur_types');

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
        Schema::drop('formateurs');
    }
}
