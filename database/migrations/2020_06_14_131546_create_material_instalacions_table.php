<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialInstalacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MaterialInstalacion', function (Blueprint $table) {
            $table->unsignedBigInteger('IdFicha');
            $table->unsignedBigInteger('IdValorAdicional');
            $table->integer('Cantidad');
            $table->double('CostoUnitario', 5, 2);
            $table->string('Comentario', 255);
            $table->timestamps();

            $table->primary(['IdFicha', 'IdValorAdicional']);

            $table->foreign('IdFicha')->references('Id')->on('Ficha');
            $table->foreign('IdValorAdicional')->references('Id')->on('ValorAdicional');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('MaterialInstalacion');
    }
}
