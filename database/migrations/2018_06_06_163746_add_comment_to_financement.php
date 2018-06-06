<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCommentToFinancement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('financeur_inscriptions', function($table) {
	    $table->string('commentaire')->nullable();
	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	Schema::table('financeur_inscriptions', function($table) {
	    $table->dropColumn('commentaire');
	});
    }
}
