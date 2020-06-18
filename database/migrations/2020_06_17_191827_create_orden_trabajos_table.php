<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenTrabajosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('OrdenTrabajo', function (Blueprint $table) {
            $table->id('Id');
            $table->date('Fecha');
            $table->string('Dano', 255);
            $table->string('Resultado', 255);
            $table->boolean('Activa');
            $table->date('FechaHoraArrivo');
            $table->date('FechaHoraSalida');
            $table->unsignedBigInteger('IdFicha');
            $table->unsignedBigInteger('IdTurno');
            $table->unsignedBigInteger('IdEmpleado');
            $table->timestamps();

            $table->foreign('IdFicha')->references('Id')->on('Ficha');
            $table->foreign('IdTurno')->references('Id')->on('TurnoOrdenTrabajo');
            $table->foreign('IdEmpleado')->references('Id')->on('Usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('OrdenTrabajo');
    }
}
