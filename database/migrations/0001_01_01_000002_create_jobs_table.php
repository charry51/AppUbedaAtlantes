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
        // 1. TABLA 'jobs' (Trabajos en cola)
        // Laravel la usa para procesar tareas pesadas en segundo plano (ej: enviar 500 emails masivos)
        // en lugar de hacer esperar al usuario a que cargue la página.
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('queue')->index(); // Nombre de la cola de trabajo
            $table->longText('payload'); // Los datos de la tarea a procesar
            $table->unsignedTinyInteger('attempts'); // Veces que ha intentado hacerla y ha fallado
            $table->unsignedInteger('reserved_at')->nullable();
            $table->unsignedInteger('available_at');
            $table->unsignedInteger('created_at');
        });

        // 2. TABLA 'job_batches' (Lotes de trabajo)
        // Permite agrupar varias tareas juntas y saber cuándo han terminado todas
        Schema::create('job_batches', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->integer('total_jobs');
            $table->integer('pending_jobs');
            $table->integer('failed_jobs');
            $table->longText('failed_job_ids');
            $table->mediumText('options')->nullable();
            $table->integer('cancelled_at')->nullable();
            $table->integer('created_at');
            $table->integer('finished_at')->nullable();
        });

        // 3. TABLA 'failed_jobs' (Trabajos fallidos)
        // Si una tarea en segundo plano falla del todo, se guarda aquí el motivo y el error
        // para que el programador pueda revisarlo después
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception'); // El error técnico que hizo que fallara
            $table->timestamp('failed_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('job_batches');
        Schema::dropIfExists('failed_jobs');
    }
};