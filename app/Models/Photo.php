<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = ['event_id', 'image_path'];

    // Una foto pertenece a un evento
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}