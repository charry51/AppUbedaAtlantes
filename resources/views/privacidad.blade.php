@extends('layouts.app')

@section('title', 'Política de Privacidad - Úbeda Atlantes')

@section('styles')
<style>
    .doc-container { max-width: 800px; margin: 120px auto 50px auto; padding: 40px; background-color: var(--bg-secundario); border-radius: 8px; border: 1px solid var(--borde-color); }
    .doc-container h1 { color: var(--rojo-pasion); font-size: 2.5rem; text-align: center; margin-bottom: 10px; }
    .doc-container h2 { color: var(--texto-principal); font-size: 1.8rem; margin-top: 40px; border-bottom: 2px solid var(--rojo-pasion); padding-bottom: 10px; }
    .doc-container p, .doc-container li { line-height: 1.8; color: var(--texto-secundario); margin-bottom: 15px; }
    .btn-volver { display: inline-block; margin-bottom: 20px; color: var(--rojo-pasion); text-decoration: none; font-weight: bold; }
    .btn-volver:hover { text-decoration: underline; }
</style>
@endsection

@section('content')
    <div class="doc-container">
        <a href="{{ url('/') }}" class="btn-volver"><i class="fa-solid fa-arrow-left"></i> Volver a la web</a>

        <h1>POLÍTICA DE PRIVACIDAD</h1>

        <h2>1. Responsable del Tratamiento</h2>
        <p>El responsable del tratamiento de los datos recabados en este sitio web es el <strong>Club de Rugby Úbeda Atlantes</strong>, con correo electrónico de contacto: info@rugbyubedaatlantes.es.</p>

        <h2>2. Finalidad de los datos</h2>
        <p>Los datos personales recogidos a través del formulario de "Únete al Equipo" (nombre, teléfono, edad y experiencia) serán utilizados exclusivamente con la finalidad de gestionar la captación de nuevos jugadores y ponernos en contacto con usted vía WhatsApp o llamada telefónica.</p>

        <h2>3. Conservación y Derechos</h2>
        <p>Los datos se conservarán mientras exista un interés mutuo. Usted tiene derecho a acceder, rectificar, limitar y suprimir sus datos en cualquier momento enviando un correo a nuestra dirección de contacto.</p>
    </div>
@endsection