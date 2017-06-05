<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('dni',8)->unique();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('foto')->default('user.png');
            $table->string('funcion');
            $table->integer('oficinas_id')->unsigned(); //unsigned(); acepta valores positivos
            $table->foreign('oficinas_id')->references('id')->on('oficinas');

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
        Schema::drop('users');
    }
}
