<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['season_id', 'name', 'date'];

    // Un evento pertenece a una temporada
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