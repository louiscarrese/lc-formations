<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteCascade extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /** When we delete a MODULE, we want to... */
        //DELETE all related SESSIONS
        Schema::table('sessions', function($table) {
            $table->dropForeign('sessions_module_id_foreign');
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
        });
        //DELETE all related FORMATEUR_MODULE
        Schema::table('formateur_module', function($table) {
            $table->dropForeign('formateur_module_module_id_foreign');
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
        });
        //DELETE all related TARIFS
        Schema::table('tarifs', function($table) {
            $table->dropForeign('tarifs_module_id_foreign');
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
        });

        /** When we delete a SESSION, we want to... */
        //DELETE all related INSCRIPTIONS
        Schema::table('inscriptions', function($table) {
            $table->dropForeign('inscriptions_session_id_foreign');
            $table->foreign('session_id')->references('id')->on('sessions')->onDelete('cascade');
        });
        //DELETE all related SESSION_JOURS
        Schema::table('session_jours', function($table) {
            $table->dropForeign('session_jours_session_id_foreign');
            $table->foreign('session_id')->references('id')->on('sessions')->onDelete('cascade');
        });

        /** When we delete a SESSION_JOUR, we want to... */
        //DELETE all related FORMATEUR_SESSION_JOURS
        Schema::table('formateur_session_jour', function($table) {
            $table->dropForeign('formateur_session_jour_session_jour_id_foreign');
            $table->foreign('session_jour_id')->references('id')->on('session_jours')->onDelete('cascade');
        });

        /** When we delete a INSCRIPTION, we want to... */
        //DELETE all related FINANCEUR_INSCRIPTIONS
        Schema::table('financeur_inscriptions', function($table) {
            $table->dropForeign('financeur_inscriptions_inscription_id_foreign');
            $table->foreign('inscription_id')->references('id')->on('inscriptions')->onDelete('cascade');
        });

        /** When we delete a STAGIAIRE, we want to... */
        //DELETE all related INSCRIPTIONS
        Schema::table('inscriptions', function($table) {
            $table->dropForeign('inscriptions_stagiaire_id_foreign');
            $table->foreign('stagiaire_id')->references('id')->on('stagiaires')->onDelete('cascade');
        });

        /** When we delete a FORMATEUR, we want to...  */
        //DELETE all related FORMATEUR_MODULE
        Schema::table('formateur_module', function($table) {
            $table->dropForeign('formateur_module_formateur_id_foreign');
            $table->foreign('formateur_id')->references('id')->on('modules')->onDelete('cascade');
        });

        /** When we delete an EMPLOYEUR, we want to... */
        //SET NULL all related STAGIAIRE
        Schema::table('stagiaires', function($table) {
            $table->dropForeign('stagiaires_employeur_id_foreign');
            $table->foreign('employeur_id')->references('id')->on('employeurs')->onDelete('set null');
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
