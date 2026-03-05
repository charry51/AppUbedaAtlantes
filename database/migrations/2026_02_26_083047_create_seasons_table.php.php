<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        // TABLA 'seasons' (Temporadas de la Galería)
        // Agrupa las diferentes carpetas de fotos anuales (Ej: "Temporada 2024-2025")
        Schema::create('seasons', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Ej: "Temporada 2025-2026"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seasons');
    }
};