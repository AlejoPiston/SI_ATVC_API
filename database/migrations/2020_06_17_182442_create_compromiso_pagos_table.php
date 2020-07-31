<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompromisoPagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CompromisoPago', function (Blueprint $table) {
            $table->id('Id');
            $table->date('Fecha');
            $table->string('Observacion', 50);
            $table->unsignedBigInteger('IdFicha');
            $table->unsignedBigInteger('IdUsuario');
            $table->timestamps();

            $table->foreign('IdFicha')->references('Id')->on('Ficha');
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
        Schema::dropIfExists('CompromisoPago');
    }
}
