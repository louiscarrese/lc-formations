<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTarifToInscription extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inscriptions', function($table) {
            $table->integer('tarif_id')->unsigned()->nullable();
            $table->foreign('tarif_id')->references('id')->on('tarifs')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inscriptions', function($table) {
            $table->dropForeign('tarif_id');
            $table->dropColumn('tarif_id');
        });
    }
}
