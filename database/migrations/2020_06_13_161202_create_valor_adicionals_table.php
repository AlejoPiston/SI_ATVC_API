<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValorAdicionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ValorAdicional', function (Blueprint $table) {
            $table->id('Id');
            $table->string('Nombre', 150);
            $table->double('Costo', 5, 2);
            $table->string('Descripcion', 255);
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
        Schema::dropIfExists('ValorAdicional');
    }
}
