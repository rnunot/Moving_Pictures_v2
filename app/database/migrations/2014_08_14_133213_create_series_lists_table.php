<?php

use Illuminate\Database\Migrations\Migration;

class CreateSeriesListsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series_lists', function($table) {
            $table->integer('list_id')->unsigned();
            $table->integer('series_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->primary(array('list_id', 'series_id'));
            $table->foreign('series_id')->references('id')->on('series');
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
        Schema::drop('series_lists');
    }

}