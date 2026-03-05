<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Campos que se pueden guardar masivamente al crear un usuario.
     * Sirve para que no se puedan inyectar campos como 'is_admin' maliciosamente.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Estos campos NUNCA se devolverán cuando se consulte un usuario.
     * Así evitamos filtrar contraseñas o tokens accidentalmente por una API.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Define de qué tipo deben ser tratados algunos campos.
     * Por ejemplo, decimos que 'password' siempre debe ser encriptado (hashed).
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}