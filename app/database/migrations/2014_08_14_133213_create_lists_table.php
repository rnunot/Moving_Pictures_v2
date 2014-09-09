<?php

use Illuminate\Database\Migrations\Migration;

class CreateListsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lists', function($table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('name', 150)->nullable();
            $table->string('notes', 500)->nullable();
            $table->string('type', 150)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lists');
    }

}