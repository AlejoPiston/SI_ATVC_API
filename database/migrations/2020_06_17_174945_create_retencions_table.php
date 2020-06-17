<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetencionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Retencion', function (Blueprint $table) {
            $table->id('Id');
            $table->double('BaseImponibleRenta', 5, 2);
            $table->double('PorcentajeRenta', 5, 2);
            $table->double('ValorRenta', 5, 2);
            $table->double('BaseImponibleIva', 5, 2);
            $table->double('PorcentajeIva', 5, 2);
            $table->double('ValorIva', 5, 2);
            $table->string('NumeroComprobante', 255);
        
            $table->unsignedBigInteger('IdCobro');
            $table->timestamps();

            $table->foreign('IdCobro')->references('Id')->on('Cobro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Retencion');
    }
}
