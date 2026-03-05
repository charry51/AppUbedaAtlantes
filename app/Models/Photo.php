<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    // Estos son los campos que permitimos guardar al subir una foto
    protected $fillable = ['event_id', 'image_path'];

    // Relación: Una foto pertenece siempre a un evento en concreto
    // Así podemos saber de qué partido es cada foto
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}