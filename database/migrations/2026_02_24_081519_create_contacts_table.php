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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nombre completo
            $table->string('phone'); // Teléfono / WhatsApp
            $table->integer('age')->nullable(); // Edad
            $table->boolean('has_experience')->default(false); // ¿Ha jugado antes?
            $table->text('message')->nullable(); // Mensaje o posición en la que juega
            $table->timestamps(); // Guarda automáticamente cuándo enviaron el formulario
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
