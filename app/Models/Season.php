<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;

    // Campo permitido para rellenar (el nombre de la temporada, ej: "2024/2025")
    protected $fillable = ['name'];

    // Relación: Una temporada tiene muchos eventos (partidos)
    // Con esto podemos sacar todos los partidos de un año de golpe: $temporada->events
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}