<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Usuario', function (Blueprint $table) {
            $table->id('Id');
            $table->string('Nombres', 50);
            $table->string('Apellidos', 50);
            $table->string('Cedula', 50);
            $table->string('Direccion', 255);
            $table->string('Telefono', 50);
            $table->string('Tipo', 50);
            $table->string('Password', 50);
            $table->string('Usuario', 50);
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
        Schema::dropIfExists('Usuario');
    }
}
