<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function($table) {
            $table->increments('id');
            $table->string('name', 150)->nullable();
            $table->dateTime('birthdate');
            $table->string('email', 250);
            $table->char('sex', 1)->nullable();
            $table->string('login', 200);
            $table->string('password', 200);
            $table->string('activation_string', 200);
            $table->integer('status'); //current user status 
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
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