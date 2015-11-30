<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormateurModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formateur_modules', function (Blueprint $table) {
            $table->integer('formateur_id')->unsigned();
            $table->foreign('formateur_id')->references('id')->on('formateurs');

            $table->integer('module_id')->unsigned();
            $table->foreign('module_id')->references('id')->on('modules');

            $table->primary(['formateur_id', 'module_id']);

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
        Schema::drop('formateur_modules');
    }
}
