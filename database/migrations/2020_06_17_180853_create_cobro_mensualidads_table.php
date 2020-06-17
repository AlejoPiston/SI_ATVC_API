<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCobroMensualidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CobroMensualidad', function (Blueprint $table) {
            $table->unsignedBigInteger('IdCobro');
            $table->unsignedBigInteger('IdMensualidad');
            $table->double('Valor', 5, 2);
            $table->timestamps();

            $table->foreign('IdCobro')->references('Id')->on('Cobro');
            $table->foreign('IdMensualidad')->references('Id')->on('Mensualidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('CobroMensualidad');
    }
}
