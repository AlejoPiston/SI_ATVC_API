<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGastosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Gasto', function (Blueprint $table) {
            $table->id('Id');
            $table->date('Fecha');
            $table->string('Concepto', 255);
            $table->double('Monto', 5, 2);
            $table->unsignedBigInteger('IdUsuario');
            $table->timestamps();

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
        Schema::dropIfExists('Gasto');
    }
}
