<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StringLengthInscriptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inscriptions', function($table) {
            $table->string('profession_structure', 2000)->change();
            $table->string('experiences', 2000)->change();
            $table->string('attentes', 2000)->change();
            $table->string('suggestions', 2000)->change();
            $table->string('formations_precedentes', 2000)->change();
        });     
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
