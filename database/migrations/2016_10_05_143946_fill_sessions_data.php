<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use ModuleFormation\Session;

class FillSessionsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Get all the sessions
        $sessions = Session::all();

        //Fill the fields if needed
        foreach($sessions as $session) {
            $modified = false;
            if(empty($session->objectifs_pedagogiques)) {
                $session->objectifs_pedagogiques = $session->module->objectifs_pedagogiques;
                $modified = true;
            }
            if(empty($session->materiel)) {
                $session->materiel = $session->module->materiel;
                $modified = true;
            }
            if(empty($session->effectif_max)) {
                $session->effectif_max = $session->module->effectif_max;
                $modified = true;
            }
            if($modified) {
                $session->save();
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //There is no coming back from this
    }
}
