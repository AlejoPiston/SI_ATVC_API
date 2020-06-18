<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurnoOrdenTrabajosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TurnoOrdenTrabajo', function (Blueprint $table) {
            $table->id('Id');
            $table->unsignedBigInteger('Hora');
            $table->unsignedBigInteger('Minuto');
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
        Schema::dropIfExists('TurnoOrdenTrabajo');
    }
}
