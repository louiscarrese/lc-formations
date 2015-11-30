<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormateurSessionJoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formateur_session_jours', function (Blueprint $table) {
            $table->integer('formateur_id')->unsigned();
            $table->foreign('formateur_id')->references('id')->on('formateurs');

            $table->integer('session_jour_id')->unsigned();
            $table->foreign('session_jour_id')->references('id')->on('session_jours');

            $table->primary(['formateur_id', 'session_jour_id']);

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
        Schema::drop('formateur_session_jours');
    }
}
