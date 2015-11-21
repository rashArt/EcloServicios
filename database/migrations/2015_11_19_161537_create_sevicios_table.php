<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeviciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo_id')->unsigned();
            $table->integer('cliente_id')->unsigned();
            $table->integer('tecnico_id')->unsigned();
            $table->integer('status');
            $table->timestamps();

            $table->foreign('tipo_id')->references('id')->on('tipos_servicios');
            $table->foreign('cliente_id')->references('id')->on('users');
            $table->foreign('tecnico_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('servicios');
    }
}
