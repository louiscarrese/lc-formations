<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use ModuleFormation\User;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 60)->unique();
            $table->string('email', 60)->nullable();
            $table->string('password', 60);
            $table->string('remember_token', 1000)->nullable();
            $table->timestamps();
        });

        $mainUser = new User();
        $mainUser->name="administrator";
        $mainUser->email="";
        $mainUser->password=bcrypt('newadmin');
        $mainUser->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
