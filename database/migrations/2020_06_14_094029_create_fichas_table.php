<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Ficha', function (Blueprint $table) {
            $table->id('Id');
            $table->string('Nombres', 50);
            $table->string('Apellidos', 50)->nullable();
            $table->string('CedulaRuc', 50)->nullable();
            $table->string('DireccionDomicilio', 255)->nullable();
            $table->string('TelefonoDomicilio', 50)->nullable();
            $table->string('DireccionCobro', 255)->nullable();
            $table->string('TelefonoCobro', 50)->nullable();
            $table->string('Referencia', 255)->nullable();
            $table->boolean('CobroDomicilio')->nullable();
            $table->boolean('Archivada')->nullable();
            $table->datetime('FechaInscripcion')->nullable();
            $table->string('Email', 255)->nullable();
            $table->double('ValorInscripcion', 5, 2)->nullable();
            $table->double('ValorMaterial', 5, 2)->nullable();
            $table->double('ValorOtros', 5, 2)->nullable();
            $table->double('ValorMensual', 5, 2)->nullable();
            $table->datetime('FechaCobro')->nullable();
            $table->string('Observacion', 255)->nullable();
            $table->boolean('Estado')->nullable();
            $table->integer('TvAdicional')->nullable();
            $table->boolean('Filtro')->nullable();
            $table->integer('MensualidadesPendientes')->nullable();
            $table->boolean('Factura')->nullable();
            $table->boolean('Renegociar')->nullable();
            $table->datetime('PagadoHasta')->nullable();
            $table->string('NumSerieEquipo', 50)->nullable();
            $table->boolean('EquipoRetirado')->nullable();
            //Campos aumentados para ficha
            $table->string('Latitud')->nullable();
            $table->string('Longitud')->nullable();

            $table->unsignedBigInteger('IdZona')->nullable();
            $table->unsignedBigInteger('IdServicio')->nullable();
            $table->unsignedBigInteger('IdUsuario')->nullable();
            $table->timestamps();

            $table->foreign('IdZona')->references('Id')->on('Zona');
            $table->foreign('IdServicio')->references('Id')->on('Servicio');
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
        Schema::dropIfExists('Ficha');
    }
}
