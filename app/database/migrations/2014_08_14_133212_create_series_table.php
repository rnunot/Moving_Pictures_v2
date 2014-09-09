<?php

use Illuminate\Database\Migrations\Migration;

class CreateSeriesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series', function($table) {
            $table->increments('id');
            $table->string('name', 200);
            $table->integer('n_eps')->nullable();
            $table->string('genre', 200)->nullable();
            $table->string('imdb_link', 1024)->nullable();
            $table->string('author', 150)->nullable();
            $table->string('IMAGEM', 300)->nullable();
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
        Schema::drop('series');
    }

}