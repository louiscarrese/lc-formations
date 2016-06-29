<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropFinanceurTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('financeurs', function($table) {
            $table->dropForeign('financeurs_financeur_type_id_foreign');
        });
        Schema::drop('financeur_types');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('financeur_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelle');
            $table->timestamps();
        });

        Schema::table('financeurs', function($table) {
            $table->foreign('financeur_type_id')->references('id')->on('financeur_types');
        });
    }
}
