<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDescargosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descargos', function (Blueprint $table) {
             $table->increments('id');
            $table->string('tipo_doc');
            $table->string('cardex');
            $table->string('receptor');
            $table->integer('registros_id')->unsigned();
            $table->integer('users_id')->unsigned();
            $table->integer('users_ed')->unsigned();
            $table->foreign('registros_id')->references('id')->on('registros')
                    ->onDelete('cascade');
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
        Schema::drop('descargos');
    }
}
