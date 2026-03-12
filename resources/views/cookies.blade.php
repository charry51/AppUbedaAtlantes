@extends('layouts.app')

@section('title', 'Política de Cookies - Úbeda Atlantes')

@section('styles')
<style>
    .doc-container { max-width: 800px; margin: 120px auto 50px auto; padding: 40px; background-color: var(--bg-secundario); border-radius: 8px; border: 1px solid var(--borde-color); }
    .doc-container h1 { color: var(--rojo-pasion); font-size: 2.5rem; text-align: center; margin-bottom: 10px; }
    .doc-container h2 { color: var(--texto-principal); font-size: 1.8rem; margin-top: 40px; border-bottom: 2px solid var(--rojo-pasion); padding-bottom: 10px; }
    .doc-container p, .doc-container li { line-height: 1.8; color: var(--texto-secundario); margin-bottom: 15px; }
    .doc-container ul { margin-bottom: 20px; padding-left: 20px; }
    .btn-volver { display: inline-block; margin-bottom: 20px; color: var(--rojo-pasion); text-decoration: none; font-weight: bold; }
    .btn-volver:hover { text-decoration: underline; }
</style>
@endsection

@section('content')
    <div class="doc-container">
        <a href="{{ url('/') }}" class="btn-volver"><i class="fa-solid fa-arrow-left"></i> Volver a la web</a>

        <h1>POLÍTICA DE COOKIES</h1>

        <h2>1. ¿Qué son las cookies?</h2>
        <p>Una cookie es un fichero que se descarga en su ordenador o dispositivo móvil al acceder a determinadas páginas web. Las cookies permiten a una página web, entre otras cosas, almacenar y recuperar información sobre los hábitos de navegación de un usuario o de su equipo.</p>

        <h2>2. Cookies utilizadas en esta web</h2>
        <p>Esta página web utiliza exclusivamente cookies técnicas y de personalización (Local Storage) propias y estrictamente necesarias para el correcto funcionamiento del sitio. En concreto:</p>
        <ul>
            <li><strong>temaElegido:</strong> Se utiliza para recordar si el usuario prefiere el modo claro o el modo oscuro de la web.</li>
            <li><strong>cookiesAceptadas:</strong> Se utiliza para recordar que el usuario ya ha aceptado el banner de cookies y no volver a mostrárselo.</li>
        </ul>

        <h2>3. Desactivación de cookies</h2>
        <p>El usuario puede, en cualquier momento, permitir, bloquear o eliminar las cookies instaladas en su equipo mediante la configuración de las opciones del navegador instalado en su ordenador.</p>
    </div>
@endsection