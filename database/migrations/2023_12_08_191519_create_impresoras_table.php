<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImpresorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('impresoras', function (Blueprint $table) {
            $table->id();
            $table->string('orden');
            $table->string('serie');
            $table->string('nombre');
            $table->unsignedBigInteger('toner_id');
            $table->unsignedBigInteger('ubicacion_id');
            $table->string('estado');
            $table->text('descripcion')->nullable();
            $table->timestamps();
    
            // Definir las claves foráneas
            $table->foreign('toner_id')->references('id')->on('toners')->onDelete('cascade');
            $table->foreign('ubicacion_id')->references('id')->on('ubicaciones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('impresoras');
    }
}
