<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinanceurInscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financeur_inscription', function (Blueprint $table) {
            $table->integer('financeur_id')->unsigned();
            $table->foreign('financeur_id')->references('id')->on('financeurs');

            $table->integer('inscription_id')->unsigned();
            $table->foreign('inscription_id')->references('id')->on('inscriptions');

            $table->primary(['financeur_id', 'inscription_id']);

            $table->float('montant');

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
        Schema::drop('financeur_inscriptions');
    }
}
