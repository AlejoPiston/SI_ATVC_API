<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCancelacionOrdenTrabajosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CancelacionOrdenTrabajo', function (Blueprint $table) {
            $table->id();

            $table->string('Justificacion')->nullable();
            $table->unsignedBigInteger('IdOrdenTrabajo');
            $table->unsignedBigInteger('Cancelado_por');

            $table->foreign('IdOrdenTrabajo')->references('Id')->on('OrdenTrabajo');
            $table->foreign('Cancelado_por')->references('id')->on('users');
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
        Schema::dropIfExists('CancelacionOrdenTrabajo');
    }
}
