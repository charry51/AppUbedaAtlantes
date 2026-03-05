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
        // TABLA 'events' (Eventos/Partidos de la Galería)
        // Se usa dentro de las temporadas para almacenar los álbumes específicos (Ej: "Derbi contra Jaén")
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('season_id')->constrained()->onDelete('cascade'); // Conectado a la temporada
            $table->string('name'); // Ej: "Derbi contra Jaén"
            $table->date('date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};