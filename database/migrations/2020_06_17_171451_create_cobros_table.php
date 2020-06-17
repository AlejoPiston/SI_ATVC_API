<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCobrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cobro', function (Blueprint $table) {
            $table->id('Id');
            $table->date('Fecha');
            $table->double('ValorEfectivo', 5, 2);
            $table->double('ValorCheque', 5, 2);
            $table->string('NumeroCheque', 50);
            $table->string('BancoCheque', 50);
            $table->double('ValorTotal', 5, 2);
            $table->double('Iva', 5, 2);
            $table->string('Concepto', 50);
            $table->string('NumeroDocumento', 255);
            $table->string('TipoDocumento', 50);
            $table->double('Descuento', 5, 2);
            $table->double('Ice', 5, 2);
            $table->string('Observacion', 255);
            $table->boolean('Reverso');
            $table->string('ComentarioReverso', 255);
            $table->double('Retencion', 5, 2);
            $table->date('FechaReverso');
            $table->string('EnviadoAzur', 255);
            $table->string('Electronico', 255);
            $table->boolean('PorCobrar');
        
            $table->unsignedBigInteger('IdUsuario');
            $table->unsignedBigInteger('IdUsuarioReverso');
            $table->unsignedBigInteger('Establecimiento');
            $table->unsignedBigInteger('PuntoEmision');
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
        Schema::dropIfExists('Cobro');
    }
}
