<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo',            // NUEVO
        'nombre_torneo',   // NUEVO
        'rival',
        'fecha',
        'lugar',
        'es_local',
        'rival_logo',
    ];
}