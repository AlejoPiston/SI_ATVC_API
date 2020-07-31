<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstalacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Instalacion', function (Blueprint $table) {
            $table->id('Id');
            $table->string('NombreCliente', 255);
            $table->string('Direccion', 255);
            $table->string('Referencia', 255);
            $table->string('Telefono', 255);
            $table->date('Fecha');
            $table->boolean('Activa');
            $table->string('Resultado', 255);
            $table->date('FechaHoraArrivo');
            $table->date('FechaHoraSalida');
            $table->unsignedBigInteger('IdVendedor');
            $table->unsignedBigInteger('IdTurno');
            $table->unsignedBigInteger('IdEmpleado');
            $table->timestamps();

            $table->foreign('IdVendedor')->references('id')->on('users');
            $table->foreign('IdTurno')->references('Id')->on('TurnoOrdenTrabajo');
            $table->foreign('IdEmpleado')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Instalacion');
    }
}
