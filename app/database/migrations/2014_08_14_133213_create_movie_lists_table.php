<?php

use Illuminate\Database\Migrations\Migration;

class CreateMovielistsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_lists', function($table) {
            $table->integer('list_id')->unsigned();
            $table->integer('movie_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->primary(array('list_id', 'movie_id'));
            $table->foreign('movie_id')->references('id')->on('movies');
            $table->foreign('list_id')->references('id')->on('lists');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('movie_lists');
    }

}