<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('games', function (Blueprint $table) {
            // Añadimos el tipo (partido o torneo) y el nombre del torneo por si hace falta
            $table->string('tipo')->default('partido')->after('id'); 
            $table->string('nombre_torneo')->nullable()->after('tipo'); // Ej: "I Rugby Fest La Loma"
            
            // Hacemos que el rival no sea obligatorio (porque en un torneo hay muchos)
            $table->string('rival')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('games', function (Blueprint $table) {
            $table->dropColumn('tipo');
            $table->dropColumn('nombre_torneo');
            $table->string('rival')->nullable(false)->change();
        });
    }
};
