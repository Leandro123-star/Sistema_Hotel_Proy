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
        Schema::create('habitaciones', function (Blueprint $table) {
             $table->id('id_habitacion');
            $table->string('numero');
            $table->integer('piso');
            $table->integer('capacidad');
            $table->decimal('precio_noche', 8, 2);
            $table->string('estado');
            $table->bigInteger('id_tipo');
            $table->timestamps();

            $table->foreign('id_tipo')->references('id_tipo')->on('tipos_habitacion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habitaciones');
    }
};
