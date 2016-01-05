<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinanceursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financeurs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelle')->nullable();
            $table->string('structure')->nullable();
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('adresse')->nullable();
            $table->string('code_postal')->nullable();
            $table->string('ville')->nullable();
            $table->string('tel')->nullable();
            $table->string('email')->nullable();

            $table->integer('financeur_type_id')->unsigned();
            $table->foreign('financeur_type_id')->references('id')->on('financeur_types');

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
        Schema::drop('financeurs');
    }
}
