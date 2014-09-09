<?php

use Illuminate\Database\Migrations\Migration;

class CreateSeriescommentsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series_comments', function($table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('series_id')->unsigned()->index();
            $table->text('content')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('series_id')->references('id')->on('series');
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
        Schema::drop('series_comments');
    }

}