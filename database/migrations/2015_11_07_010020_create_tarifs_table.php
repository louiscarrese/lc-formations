<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarifs', function (Blueprint $table) {
            $table->integer('module_id')->unsigned();
            $table->foreign('module_id')->references('id')->on('modules');

            $table->integer('tarif_type_id')->unsigned();
            $table->foreign('tarif_type_id')->references('id')->on('tarif_types');

            $table->primary(['module_id', 'tarif_type_id']);


            $table->float('montant')->nullable();
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
        Schema::drop('tarifs');
    }
}
