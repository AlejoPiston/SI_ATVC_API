<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMensualidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Mensualidad', function (Blueprint $table) {
            $table->id('Id');
            $table->date('FechaInicio');
            $table->date('FechaFin');
            $table->double('Valor', 5, 2);
            $table->double('Abono', 5, 2);
            $table->double('Saldo', 5, 2);
            $table->string('Tipo', 50);
            $table->boolean('AplicaIce');
            $table->unsignedBigInteger('IdFicha');
            $table->timestamps();

            $table->foreign('IdFicha')->references('Id')->on('Ficha');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Mensualidad');
    }
}
