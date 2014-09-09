<?php

use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function($table) {
            $table->increments('id');
            $table->string('title', 200)->nullable();
            $table->string('imdb_link', 1024)->nullable();
            $table->time('duration')->nullable();
            $table->string('director', 150)->nullable();
            $table->string('genre', 200)->nullable();
            $table->string('image', 300)->nullable();
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
        Schema::drop('movies');
    }

}