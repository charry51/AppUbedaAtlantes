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
    Schema::create('games', function (Blueprint $table) {
        $table->id();
        $table->string('rival'); // Nombre del equipo contrario
        $table->string('rival_logo')->nullable(); // URL del logo del equipo contrario
        $table->dateTime('fecha'); // Día y hora
        $table->string('lugar'); // Donde se juega
        $table->boolean('es_local')->default(true); // ¿Jugáis en casa?
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
