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
            $table->string('Resultado', 255)->nullable();
            $table->string('Activa')->nullable(); //Estado
            $table->date('FechaHoraArrivo')->nullable();
            $table->date('FechaHoraSalida')->nullable();
            $table->unsignedBigInteger('IdFicha');
            $table->unsignedBigInteger('IdTurno')->nullable();
            $table->unsignedBigInteger('IdEmpleado');
            $table->unsignedBigInteger('IdUsuario')->nullable();
            $table->timestamps();

            $table->foreign('IdFicha')->references('Id')->on('Ficha');
            $table->foreign('IdTurno')->references('Id')->on('TurnoOrdenTrabajo');
            $table->foreign('IdEmpleado')->references('id')->on('users');
            $table->foreign('IdUsuario')->references('id')->on('users');
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
