<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    // 'Game' se conecta automáticamente a la tabla 'games'.
    // $fillable protege contra asignación masiva maliciosa.
    protected $fillable = [
        'rival',
        'fecha',
        'lugar',
        'es_local',
        'rival_logo',
    ];
}