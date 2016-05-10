<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSearchDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('search__datas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('depart_city');
            $table->string('arrive_city');
            $table->string('depart_date');
            $table->string('return_date');
            $table->integer('adult');
            $table->integer('child');
            $table->integer('infant');
            $table->string('token');
            $table->integer('ver');
            $table->longtext('result');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('search__datas');
    }
}
