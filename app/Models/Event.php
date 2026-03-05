<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    // Campos que se pueden rellenar de forma masiva (por ejemplo al crear desde un formulario)
    protected $fillable = ['season_id', 'name', 'date'];

    // Relación: Un evento (partido/torneo) pertenece siempre a una única temporada (Season)
    // Esto nos permite hacer cosas como $evento->season->name
    public function season()
    {
        return $this->belongsTo(Season::class);
    }

    // Y un evento tiene muchas fotos
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}