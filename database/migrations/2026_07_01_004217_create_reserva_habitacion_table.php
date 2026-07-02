<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reserva_habitacion', function (Blueprint $table) {
             $table->id('id_detalle');
            $table->bigInteger('id_reserva');
            $table->bigInteger('id_habitacion');
            $table->timestamps();

            $table->foreign('id_reserva')->references('id_reserva')->on('reservas')->onDelete('cascade');
            $table->foreign('id_habitacion')->references('id_habitacion')->on('habitaciones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserva_habitacion');
    }
};
