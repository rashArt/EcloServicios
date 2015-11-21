<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSevicioImagenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicio_imagen', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('servicio_id')->unsigned();
            $table->integer('imagen_id')->unsigned();
            $table->timestamps();

            $table->foreign('servicio_id')->references('id')->on('servicios');
            $table->foreign('imagen_id')->references('id')->on('imagenes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('servicio_imagen');
    }
}
