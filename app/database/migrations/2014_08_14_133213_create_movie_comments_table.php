<?php

use Illuminate\Database\Migrations\Migration;

class CreateMoviecommentsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_comments', function($table) {
            $table->increments('id');
            $table->integer('movie_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->text('content')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('movie_id')->references('id')->on('movies');
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
        Schema::drop('movie_comments');
    }

}