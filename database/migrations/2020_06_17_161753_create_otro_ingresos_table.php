<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtroIngresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('OtroIngreso', function (Blueprint $table) {
            $table->id('Id');
            $table->date('Fecha');
            $table->string('Concepto', 255);
            $table->double('Monto', 5, 2);
            $table->unsignedBigInteger('IdUsuario');
            $table->timestamps();

            $table->foreign('IdUsuario')->references('Id')->on('Usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('OtroIngreso');
    }
}