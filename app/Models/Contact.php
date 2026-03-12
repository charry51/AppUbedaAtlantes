<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    // Este modelo representa la tabla 'contacts' en la BD.
    // $fillable protege contra asignación masiva maliciosa.
    protected $fillable = [
        'name',
        'phone',
        'age',
        'has_experience',
        'team_interest',
        'message',
    ];
}