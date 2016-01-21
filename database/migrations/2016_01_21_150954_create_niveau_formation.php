<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use ModuleFormation\NiveauFormation;

class CreateNiveauFormation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create table
        Schema::create('niveau_formations', function (Blueprint $table) {
            //Fixed ids because used in reporting
            $table->increments('id');
            $table->string('libelle');
            $table->timestamps();
        });

        //Seed it
        $niveau5 = new NiveauFormation(array(
            'libelle' => "Niveau 5 : CAP ou BEP"
            ));
        $niveau5->save();
        $niveau4 = new NiveauFormation(array(
            'libelle' => "Niveau 4 : Bac Général, Bac Professionnel, Brevet de Technicien, Brevet Professionnel"
            ));
        $niveau4->save();
        $niveau3 = new NiveauFormation(array(
            'libelle' => "Niveau 3 : Brevet de Technicien Supérieur"
            ));
        $niveau3->save();
        $niveau2 = new NiveauFormation(array(
            'libelle' => "Niveau 2 : Licence, Maîtrise"
            ));
        $niveau2->save();
        $niveau1 = new NiveauFormation(array(
            'libelle' => "Niveau 1 : Diplôme de troisièmes cycles d'université, Diplômes d'Ingénieur, etc..."
            ));
        $niveau1->save();

        //Add foreign keys
        Schema::table('stagiaires', function($table) {
            $table->integer('niveau_formation_id')->unsigned()->nullable();
            $table->foreign('niveau_formation_id')->references('id')->on('niveau_formations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stagiaires', function($table) {
            $table->dropForeign('stagiaires_niveau_formation_id_foreign');
        });
        
        Schema::drop('niveau_formations');
    }
}
