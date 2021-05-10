<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManifiesto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manifiesto', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_nomina');
            $table->unsignedBigInteger('repartidor_id'); 
            $table->foreign('repartidor_id')->references('id')->on('repartidor');
            $table->unsignedBigInteger('camion_id'); 
            $table->foreign('camion_id')->references('id')->on('camion');
            $table->unsignedBigInteger('finca_id'); 
            $table->foreign('finca_id')->references('id')->on('finca');
            $table->integer('cantidad_lotes');
            $table->integer('cantidad_lotes_entregados');
            $table->integer('cantidad_lotes_devuelto');
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
        Schema::dropIfExists('manifiesto');
    }
}
