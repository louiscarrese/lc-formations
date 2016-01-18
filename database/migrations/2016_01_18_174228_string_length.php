<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StringLength extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('modules', function($table) {
            $table->string('objectifs_pedagogiques', 2000)->change();
            $table->string('materiel', 2000)->change();
        });
        Schema::table('sessions', function($table) {
            $table->string('objectifs_pedagogiques', 2000)->change();
            $table->string('materiel', 2000)->change();
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
