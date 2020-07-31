<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCierreCajasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CierreCaja', function (Blueprint $table) {
            $table->id('Id');
            $table->date('Fecha');
            $table->double('ValorCuadrar', 5, 2);
            $table->double('Faltante', 5, 2);
            $table->string('Observacion', 255);
            $table->double('UnCentavo', 5, 2);
            $table->double('CincoCentavos', 5, 2);
            $table->double('DiezCentavos', 5, 2);
            $table->double('VeinticincoCentavos', 5, 2);
            $table->double('CincuentaCentavos', 5, 2);
            $table->double('DolarMoneda', 5, 2);
            $table->double('DolarBillete', 5, 2);
            $table->double('CincoDolares', 5, 2);
            $table->double('DiezDolares', 5, 2);
            $table->double('VeinteDolares', 5, 2);
            $table->double('CincuentaDolares', 5, 2);
            $table->double('CienDolares', 5, 2);
            $table->double('Cheques', 5, 2);
            $table->double('Ingresos', 5, 2);
            $table->double('Gastos', 5, 2);
            $table->double('MontoApertura', 5, 2);
            $table->double('MontoDeposito', 5, 2);
            $table->double('MontoCierre', 5, 2);
            $table->double('OtrosIngresos', 5, 2);
            $table->double('Retenciones', 5, 2);
            $table->boolean('Abierta');
        
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
        Schema::dropIfExists('CierreCaja');
    }
}
