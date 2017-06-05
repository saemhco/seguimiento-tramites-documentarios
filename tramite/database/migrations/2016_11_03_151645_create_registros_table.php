<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('n');
            $table->string('documento', 60);
            $table->string('emisor', 100);
            $table->string('asunto', 300);
            $table->string('adjunto', 250);
            $table->integer('oficinas_id')->unsigned();
            $table->integer('users_id')->unsigned();
            $table->integer('users_ed')->unsigned();

            $table->foreign('oficinas_id')->references('id')->on('oficinas');
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('users_ed')->references('id')->on('users');

            $table->rememberToken();
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
        Schema::drop('registros');
    }
}

