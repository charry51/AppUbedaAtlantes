<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory; // Usado para crear datos falsos en pruebas si hiciera falta

    // ESTA ES LA LÍNEA MÁGICA
    // Define qué columnas podemos insertar de golpe en la base de datos
    // Si no pones esto, Laravel bloquearía el guardado por seguridad (Evita asignación masiva maliciosa)
    protected $fillable = ['title', 'content', 'image'];
}