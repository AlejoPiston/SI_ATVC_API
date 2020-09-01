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
            $table->string('Apellidos', 50);
            $table->string('CedulaRuc', 50);
            $table->string('DireccionDomicilio', 255);
            $table->string('TelefonoDomicilio', 50);
            $table->string('DireccionCobro', 255);
            $table->string('TelefonoCobro', 50);
            $table->string('Referencia', 255);
            $table->boolean('CobroDomicilio');
            $table->boolean('Archivada');
            $table->date('FechaInscripcion');
            $table->string('Email', 255);
            $table->double('ValorInscripcion', 5, 2);
            $table->double('ValorMaterial', 5, 2);
            $table->double('ValorOtros', 5, 2);
            $table->double('ValorMensual', 5, 2);
            $table->date('FechaCobro');
            $table->string('Observacion', 250);
            $table->boolean('Estado');
            $table->integer('TvAdicional');
            $table->boolean('Filtro');
            $table->integer('MensualidadesPendientes');
            $table->boolean('Factura');
            $table->boolean('Renegociar');
            $table->date('PagadoHasta');
            $table->string('NumSerieEquipo', 50);
            $table->boolean('EquipoRetirado');
            $table->unsignedBigInteger('IdZona');
            $table->unsignedBigInteger('IdServicio');
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
