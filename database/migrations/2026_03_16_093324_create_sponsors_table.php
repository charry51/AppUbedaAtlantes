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
        Schema::create('sponsors', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('logo'); // Guardaremos la ruta de la imagen
            $table->string('enlace')->nullable(); // Web del patrocinador (opcional)
            $table->string('nivel')->default('Colaborador'); // Ej: Oro, Plata, Bronce, Institucional
            $table->integer('orden')->default(0); // Para poner a los más importantes arriba
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sponsors');
    }
};
