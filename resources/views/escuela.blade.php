@extends('layouts.app')

@section('title', 'Escuela de Rugby en Úbeda | Cantera Atlantes')

@section('seo')
    <meta name="description" content="Escuela de Rugby del Úbeda Atlantes. Formamos a niños y jóvenes en los valores del respeto, disciplina y equipo. ¡Ven a probar gratis!">
    <meta name="keywords" content="escuela rugby úbeda, deporte niños úbeda, actividades extraescolares úbeda, rugby infantil jaén">
@endsection

@section('content')
    <section class="hero" style="--bg-img: url('{{ asset('images/escuela-hero.jpg') }}'); min-height: 45vh;">
        <h1 style="text-transform: uppercase;">Nuestra Escuela</h1>
        <p>Formando a los Atlantes del mañana a través del respeto y el juego.</p>
    </section>

    <div style="max-width: 1100px; margin: 0 auto; padding: 60px 20px;">
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 40px; align-items: center; margin-bottom: 80px;">
            <div>
                <h2 style="font-family: 'Oswald'; color: var(--rojo-pasion); font-size: 2.2rem; margin-bottom: 20px;">MÁS QUE UN DEPORTE, UNA ESCUELA DE VIDA</h2>
                <p>En la escuela del Úbeda Atlantes no solo enseñamos a pasar un balón. Nuestro objetivo principal es transmitir los valores intrínsecos del rugby:</p>
                <ul style="list-style: none; padding: 0; margin-top: 20px;">
                    <li style="margin-bottom: 10px;"><i class="fa-solid fa-check-circle" style="color: var(--rojo-pasion);"></i> <strong>Respeto:</strong> Al árbitro, al compañero y al rival.</li>
                    <li style="margin-bottom: 10px;"><i class="fa-solid fa-check-circle" style="color: var(--rojo-pasion);"></i> <strong>Disciplina:</strong> Compromiso con el equipo y el entrenamiento.</li>
                    <li style="margin-bottom: 10px;"><i class="fa-solid fa-check-circle" style="color: var(--rojo-pasion);"></i> <strong>Pasión:</strong> Disfrutar de cada minuto en el césped.</li>
                </ul>
            </div>
            <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.5);">
                <img src="{{ asset('images/valores-rugby.jpg') }}" alt="Niños jugando rugby" style="width: 100%; display: block;">
            </div>
        </div>

        <h2 style="font-family: 'Oswald'; text-align: center; margin-bottom: 40px;">¿QUIÉN PUEDE UNIRSE?</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 80px;">
            <div style="background: var(--bg-secundario); padding: 30px; border-radius: 8px; text-align: center; border-bottom: 4px solid #08d7ea;">
                <h3 style="color: #08d7ea;">SUB-12</h3>
                <p style="font-size: 0.9rem;">Introducción al juego, psicomotricidad y mucha diversión.</p>
            </div>
            <div style="background: var(--bg-secundario); padding: 30px; border-radius: 8px; text-align: center; border-bottom: 4px solid var(--rojo-pasion);">
                <h3 style="color: var(--rojo-pasion);">SUB-14 / SUB-16</h3>
                <p style="font-size: 0.9rem;">Desarrollo técnico, táctica básica y espíritu de equipo.</p>
            </div>
            <div style="background: var(--bg-secundario); padding: 30px; border-radius: 8px; text-align: center; border-bottom: 4px solid #FFD700;">
                <h3 style="color: #FFD700;">SUB-18</h3>
                <p style="font-size: 0.9rem;">Preparación competitiva y transición al equipo senior.</p>
            </div>
        </div>

        <div style="background: var(--rojo-pasion); padding: 40px; border-radius: 12px; text-align: center; color: white;">
            <h2 style="font-family: 'Oswald'; margin-bottom: 15px;">¿TU HIJO/A QUIERE PROBAR?</h2>
            <p style="margin-bottom: 25px;">Los primeros entrenamientos son totalmente **GRATIS**. Solo necesita ropa deportiva y ganas de pasarlo bien.</p>
            <a href="{{ route('contacto') }}" class="btn-primary" style="background: white; color: var(--rojo-pasion); padding: 15px 30px; text-decoration: none; border-radius: 50px; font-weight: bold; font-family: 'Oswald';">¡SOLICITAR INFORMACIÓN!</a>
        </div>

    </div>
@endsection