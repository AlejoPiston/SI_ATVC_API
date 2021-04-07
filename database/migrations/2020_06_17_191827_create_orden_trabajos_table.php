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
            $table->string('Dano', 255)->nullable();
            $table->string('Resultado', 255)->nullable();
            //Estado de una orde de trabajo [registrada, confirmada, en camino, en progreso, atendida, cancelada]
            $table->string('Activa')->nullable(); 
            //Tipo de una orde de trabajo [fallo, instalacion]
            $table->string('Tipo')->nullable(); 
            $table->string('Descripcion', 255)->nullable();

            $table->datetime('FechaHoraArrivo')->nullable();
            $table->datetime('FechaHoraSalida')->nullable();
            //Campos para instalaciones 
            $table->string('NombreCliente', 255)->nullable();
            $table->string('Referencia', 255)->nullable();
            $table->string('Direccion', 255)->nullable();
            $table->string('Telefono', 255)->nullable();
            $table->unsignedBigInteger('IdVendedor')->nullable();

            $table->unsignedBigInteger('IdFicha')->nullable();
            $table->unsignedBigInteger('IdTurno')->nullable();
            $table->unsignedBigInteger('IdEmpleado');
            $table->unsignedBigInteger('IdUsuario')->nullable();
            $table->unsignedBigInteger('IdCliente')->nullable();
            $table->timestamps();

            $table->foreign('IdFicha')->references('Id')->on('Ficha');
            $table->foreign('IdTurno')->references('Id')->on('TurnoOrdenTrabajo');
            $table->foreign('IdEmpleado')->references('id')->on('users');
            $table->foreign('IdVendedor')->references('id')->on('users');
            $table->foreign('IdUsuario')->references('id')->on('users');
            $table->foreign('IdCliente')->references('id')->on('users');
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
