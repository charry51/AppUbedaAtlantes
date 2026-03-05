<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. TABLA 'cache'
        // Laravel puede usar esta tabla para guardar información temporal y hacer la web súper rápida
        // (En vez de buscar las noticias a la BD cada segundo, las guarda aquí ya calculadas durante un rato)
        Schema::create('cache', function (Blueprint $table) {
            $table->string('key')->primary(); // El nombre de lo que estamos guardando (ej: 'noticias_portada')
            $table->mediumText('value'); // El contenido real guardado
            $table->integer('expiration')->index(); // Fecha (en UNIX) de cuándo caduca este dato
        });

        // 2. TABLA 'cache_locks'
        // Sistema de seguridad interno para evitar que dos procesos intenten ejecutar 
        // exactamente la misma tarea crítica a la vez
        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->string('owner');
            $table->integer('expiration')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cache');
        Schema::dropIfExists('cache_locks');
    }
};