<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Añade la columna team_interest a la tabla contacts.
     * Anteriormente este dato se guardaba mezclado dentro del campo 'message'.
     * Ahora tiene su propia columna para poder filtrarlo desde el panel admin.
     */
    public function up(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->string('team_interest')->nullable()->after('has_experience');
        });
    }

    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn('team_interest');
        });
    }
};
