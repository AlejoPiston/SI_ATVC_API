<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUbicacionOrdenTrabajosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('UbicacionOrdenTrabajo', function (Blueprint $table) {
            $table->id('Id');
            $table->string('Latitud')->nullable();
            $table->string('Longitud')->nullable();
            $table->unsignedBigInteger('IdOrdenTrabajo')->nullable();
            $table->timestamps();
            $table->foreign('IdOrdenTrabajo')->references('Id')->on('OrdenTrabajo');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('UbicacionOrdenTrabajo');
    }
}
