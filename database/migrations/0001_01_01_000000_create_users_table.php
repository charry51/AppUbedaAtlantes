<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     * Este método 'up' se ejecuta cuando lanzas el comando: php artisan migrate
     * Se encarga de CREAR las tablas en la base de datos con las columnas especificadas.
     */
    public function up(): void
    {
        // 1. CREACIÓN DE LA TABLA 'users' (Usuarios)
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Crea una columna 'id' que es Primary Key y Autoincremental
            $table->string('name'); // Columna 'name' de tipo VARCHAR (cadena de texto)
            $table->string('email')->unique(); // Columna 'email' VARCHAR y única (no pueden repetirse correos)
            $table->timestamp('email_verified_at')->nullable(); // Fecha y hora de verificación del correo (puede ser NULL)
            $table->string('password'); // Columna 'password' para guardar la contraseña (encriptada)
            $table->rememberToken(); // Crea la columna 'remember_token' para la función de "Recordar sesión"
            $table->timestamps(); // Crea dos columnas automáticas: 'created_at' (fecha de creación) y 'updated_at' (fecha de modificación)
        });

        // 2. CREACIÓN DE LA TABLA 'password_reset_tokens' (Tokens para resetear contraseñas)
        // Laravel usa esta tabla de serie cuando un usuario olvida su contraseña y pide cambiarla
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary(); // El email usado para pedir el cambio (es la clave primaria)
            $table->string('token'); // El código/token secreto que se le envía por email
            $table->timestamp('created_at')->nullable(); // Cuándo se solicitó el reseteo
        });

        // 3. CREACIÓN DE LA TABLA 'sessions' (Sesiones activas)
        // Laravel puede guardar aquí los datos de sesión de los usuarios en lugar de usar archivos o cookies pesadas
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // El ID de la sesión generada
            $table->foreignId('user_id')->nullable()->index(); // ID del usuario al que pertenece la sesión (puede ser un invitado = NULL)
            $table->string('ip_address', 45)->nullable(); // Desde qué IP se conectó
            $table->text('user_agent')->nullable(); // Qué navegador/dispositivo está usando
            $table->longText('payload'); // Los datos internos de la sesión guardados por Laravel
            $table->integer('last_activity')->index(); // Fecha (en formato UNIX) de la última vez que interactuó
        });
    }

    /**
     * Reverse the migrations.
     * Este método 'down' hace justo lo contrario a 'up'. Se ejecuta con comandos como: php artisan migrate:rollback
     * Sirve para DESHACER los cambios (en este caso, eliminar las tablas si te has equivocado o quieres empezar de cero).
     */
    public function down(): void
    {
        Schema::dropIfExists('users'); // Borra la tabla de usuarios si existe
        Schema::dropIfExists('password_reset_tokens'); // Borra la de tokens
        Schema::dropIfExists('sessions'); // Borra la de sesiones
    }
};