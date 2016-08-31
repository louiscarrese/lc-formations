<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use ModuleFormation\Parametre;

class CreateParametreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parametres', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key', 60)->unique();
            $table->string('value', 60)->nullable();
            $table->timestamps();
        });

        $seasonStart = new Parametre();
        $seasonStart->key = 'debut_saison';
        $seasonStart->value = '01/08/2016';
        $seasonStart->save();

        $responsable = new Parametre();
        $responsable->key = 'responsable_formations';
        $responsable->value = 'Rozenn Lebastard';
        $responsable->save();

        $responsable = new Parametre();
        $responsable->key = 'pagination_threshold';
        $responsable->value = '10';
        $responsable->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('parametres');
    }
}
