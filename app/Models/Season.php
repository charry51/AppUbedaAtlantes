<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // De paso, le decimos que una temporada tiene muchos eventos
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}