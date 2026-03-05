<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Muestra la pantalla negra del candado
    public function showLogin()
    {
        return view('auth.login');
    }

    // Comprueba el email y la contraseña
    public function login(Request $request)
    {
        // 1. Validamos que haya escrito algo
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Intentamos iniciar sesión con esos datos
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Si entra, lo mandamos al panel de administrador
            return redirect()->intended('/admin');
        }

        // Si falla, lo devolvemos con un error
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }

    // Para cerrar sesión y salir del vestuario
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        // Lo devolvemos a la web pública
        return redirect('/');
    }
}