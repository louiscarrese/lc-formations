<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionJoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_jours', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->time('heure_debut');
            $table->time('heure_fin');

            $table->integer('session_id')->unsigned();
            $table->foreign('session_id')->references('id')->on('sessions');

            $table->integer('lieu_id')->unsigned();
            $table->foreign('lieu_id')->references('id')->on('lieus');

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
        Schema::drop('session_jours');
    }
}
