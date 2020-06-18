<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorteReconexionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CorteReconexion', function (Blueprint $table) {
            $table->id('Id');
            $table->date('Fechacorte');
            $table->string('ObservacionCorte', 255);
            $table->date('FechaReconexion');
            $table->string('ObservacionReconexion', 255);
            $table->unsignedBigInteger('IdFicha');
            $table->unsignedBigInteger('IdUsuarioCorte');
            $table->unsignedBigInteger('IdUsuarioReconexion');
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
        Schema::dropIfExists('CorteReconexion');
    }
}
