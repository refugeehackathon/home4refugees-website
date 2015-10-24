<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type', ['single', 'wg', 'house']);
            $table->integer('rooms');
            $table->double('size');
            $table->string('location');
            $table->date('available');
            $table->double('rent');
            $table->integer('host_id')->unsigned();
            $table->foreign('host_id')
                ->references('id')
                ->on('hosts')
                ->onDelete('cascade');
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
        Schema::drop('offers');
    }
}
