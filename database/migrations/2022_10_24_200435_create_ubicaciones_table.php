<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUbicacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ubicaciones', function (Blueprint $table) {
            $table->id();
            $table->integer('puesto');
            $table->integer('usuario_id');
            $table->text('nombreRed',50);
            $table->text('grupoRed',50);
            $table->text('ip',15);
            $table->text('observaciones')->nullable();
            $table->integer('area_id');
            $table->text('piso',5);
            $table->timestamps();

            $table->foreignId('id_user')
                  ->nullable()
                  ->constrained('users')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();
            
            $table->foreignId('id_area')
            ->nullable()
            ->constrained('areas')
            ->cascadeOnUpdate()
            ->nullOnDelete();   

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ubicaciones');
    }
}
