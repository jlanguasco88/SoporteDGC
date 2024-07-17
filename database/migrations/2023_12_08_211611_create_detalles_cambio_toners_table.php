<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallesCambioTonersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles_cambio_toners', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('impresora_id');
            $table->unsignedBigInteger('toner_id');
            $table->date('fecha_cambio');
            $table->integer('contador_impresora');
            $table->text('motivo');
            $table->timestamps();
    
            // Definir las claves foráneas
            $table->foreign('impresora_id')->references('id')->on('impresoras')->onDelete('cascade');
            $table->foreign('toner_id')->references('id')->on('toners')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalles_cambio_toners');
    }
}
