<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUbicacionIdToInsumos extends Migration
{
    
    public function up()
    {
        Schema::table('insumos', function (Blueprint $table) {
            $table->unsignedBigInteger('ubicacion_id')->nullable();
            $table->foreign('ubicacion_id')->references('id')->on('ubicaciones')->onDelete('set null');
        });
    }

   
    public function down()
    {
        Schema::table('insumos', function (Blueprint $table) {
            $table->dropForeign(['ubicacion_id']);
            $table->dropColumn('ubicacion_id');
        });
    }
}
