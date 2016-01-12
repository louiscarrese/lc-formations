<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('stagiaire_id')->unsigned();
            $table->foreign('stagiaire_id')->references('id')->on('stagiaires');

            $table->integer('session_id')->unsigned();
            $table->foreign('session_id')->references('id')->on('sessions');


            $table->string('profession_structure')->nullable();
            $table->string('experiences')->nullable();
            $table->string('attentes')->nullable();
            $table->string('suggestions')->nullable();
            $table->string('formations_precedentes')->nullable();

            $table->string('statut')->default('pending');

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
        Schema::drop('inscriptions');
    }
}
