<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Servicio', function (Blueprint $table) {
            $table->id('Id');
            $table->string('Nombre', 255);
            $table->string('Descripcion', 255)->nullable();
            $table->double('ValorInscripcion', 5, 2);
            $table->double('ValorMensualidad', 5, 2);
            $table->boolean('AplicaIva');
            $table->boolean('AplicaIce');
            $table->boolean('Estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Servicio');
    }
}
