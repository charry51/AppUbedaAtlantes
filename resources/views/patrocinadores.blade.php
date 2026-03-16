@extends('layouts.app')

@section('title', 'Patrocinadores | Úbeda Atlantes Rugby')

@section('seo')
    <meta name="description" content="Únete a la familia del Úbeda Atlantes como patrocinador. Visibilidad, valores y retorno de inversión en Úbeda y La Loma.">
    <meta name="keywords" content="patrocinar rugby, sponsors Atlantes Úbeda, empresas Úbeda, publicidad rugby Jaén">
    <meta name="author" content="Club de Rugby Úbeda Atlantes">
    <meta name="robots" content="index, follow">

    <meta property="og:title" content="Nuestros Patrocinadores | Úbeda Atlantes">
    <meta property="og:description" content="Las empresas y negocios locales que empujan con nosotros en cada melé. Descubre cómo patrocinar al club.">
    <meta property="og:image" content="{{ asset('images/principal.jpg') }}">
    <meta property="og:url" content="{{ route('patrocinadores') }}">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Nuestros Patrocinadores | Úbeda Atlantes">
    <meta name="twitter:description" content="Las empresas y negocios locales que empujan con nosotros en cada melé. Descubre cómo patrocinar al club.">
    <meta name="twitter:image" content="{{ asset('images/principal.jpg') }}">

    <link rel="canonical" href="{{ route('patrocinadores') }}">
@endsection

@section('content')
    <section class="hero" style="--bg-img: url('{{ asset('images/principal.jpg') }}'); min-height: 40vh;">
        <h1 style="text-transform: uppercase; font-size: 3rem;">Nuestros Patrocinadores</h1>
        <p>Las empresas y negocios locales que empujan con nosotros en cada melé.</p>
    </section>

    <section style="max-width: 1000px; margin: 60px auto; padding: 0 20px;">
        
        <div style="text-align: center; margin-bottom: 80px; background: var(--bg-secundario); padding: 40px; border-radius: 12px; border-top: 4px solid var(--rojo-pasion);">
            <h2 style="color: var(--texto-principal); font-family: 'Oswald', sans-serif; margin-top: 0;">MUCHO MÁS QUE UN LOGO EN UNA CAMISETA</h2>
            <p style="font-size: 1.1rem; line-height: 1.8; color: var(--texto-secundario); max-width: 800px; margin: 0 auto;">
                El Úbeda Atlantes no es solo un equipo deportivo, es un motor social en la comarca de La Loma. Apoyar a nuestro club significa asociar tu marca a los valores del rugby: <strong>respeto, esfuerzo, trabajo en equipo y nobleza</strong>. 
                <br><br>
                Con más de 14 años de historia, cobertura en medios provinciales y torneos que atraen a equipos de toda Andalucía a una ciudad Patrimonio de la Humanidad, ofrecemos un retorno de inversión real y directo en la comunidad local.
            </p>
            
            <div style="margin-top: 30px;">
                <a href="{{ route('contacto') }}" class="btn-principal" style="background-color: #333; padding: 12px 25px; border-radius: 5px; display: inline-block;"><i class="fa-solid fa-envelope"></i> Contactar para Patrocinar</a>
            </div>
        </div>

        @php
            $oro = $sponsors->where('nivel', 'Oro');
            $plata = $sponsors->where('nivel', 'Plata');
            $bronce = $sponsors->where('nivel', 'Bronce');
            $colaboradores = $sponsors->where('nivel', 'Colaborador');
        @endphp

        @if($sponsors->count() > 0)

            @if($oro->count() > 0)
                <div style="margin-bottom: 70px;">
                    <h2 style="text-align: center; color: #FFD700; border-bottom: 2px solid #FFD700; padding-bottom: 10px; margin-bottom: 40px; font-family: 'Oswald', sans-serif;"><i class="fa-solid fa-crown"></i> PATROCINADORES ORO</h2>
                    <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 40px;">
                        @foreach($oro as $sponsor)
                            <div style="background: #fff; padding: 30px; border-radius: 12px; text-align: center; width: 320px; box-shadow: 0 10px 25px rgba(255, 215, 0, 0.15); border: 2px solid #FFD700; transition: transform 0.3s ease;">
                                <a href="{{ $sponsor->enlace ?? '#' }}" {{ $sponsor->enlace ? 'target="_blank"' : '' }} style="display: block; text-decoration: none;">
                                    <img src="{{ asset('storage/' . $sponsor->logo) }}" alt="Logo {{ $sponsor->nombre }}" style="max-width: 100%; height: 140px; object-fit: contain; margin-bottom: 15px;">
                                    <h3 style="margin: 0; color: #333; font-size: 1.3rem;">{{ $sponsor->nombre }}</h3>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            @if($plata->count() > 0)
                <div style="margin-bottom: 70px;">
                    <h2 style="text-align: center; color: #C0C0C0; border-bottom: 2px solid #C0C0C0; padding-bottom: 10px; margin-bottom: 40px; font-family: 'Oswald', sans-serif;">PATROCINADORES PLATA</h2>
                    <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 30px;">
                        @foreach($plata as $sponsor)
                            <div style="background: #fff; padding: 25px; border-radius: 8px; text-align: center; width: 250px; box-shadow: 0 6px 15px rgba(0,0,0,0.1); border-bottom: 4px solid #C0C0C0;">
                                <a href="{{ $sponsor->enlace ?? '#' }}" {{ $sponsor->enlace ? 'target="_blank"' : '' }} style="display: block; text-decoration: none;">
                                    <img src="{{ asset('storage/' . $sponsor->logo) }}" alt="Logo {{ $sponsor->nombre }}" style="max-width: 100%; height: 100px; object-fit: contain; margin-bottom: 15px;">
                                    <h4 style="margin: 0; color: #333; font-size: 1.1rem;">{{ $sponsor->nombre }}</h4>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            @if($bronce->count() > 0)
                <div style="margin-bottom: 70px;">
                    <h2 style="text-align: center; color: #CD7F32; border-bottom: 2px solid #CD7F32; padding-bottom: 10px; margin-bottom: 40px; font-family: 'Oswald', sans-serif;">PATROCINADORES BRONCE</h2>
                    <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 20px;">
                        @foreach($bronce as $sponsor)
                            <div style="background: #fff; padding: 20px; border-radius: 8px; text-align: center; width: 200px; box-shadow: 0 4px 10px rgba(0,0,0,0.08); border-bottom: 3px solid #CD7F32;">
                                <a href="{{ $sponsor->enlace ?? '#' }}" {{ $sponsor->enlace ? 'target="_blank"' : '' }} style="display: block; text-decoration: none;">
                                    <img src="{{ asset('storage/' . $sponsor->logo) }}" alt="Logo {{ $sponsor->nombre }}" style="max-width: 100%; height: 80px; object-fit: contain; margin-bottom: 10px;">
                                    <h4 style="margin: 0; color: #333; font-size: 1rem;">{{ $sponsor->nombre }}</h4>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            @if($colaboradores->count() > 0)
                <div style="margin-bottom: 70px;">
                    <h2 style="text-align: center; color: var(--texto-secundario); border-bottom: 1px solid var(--borde-color); padding-bottom: 10px; margin-bottom: 40px; font-family: 'Oswald', sans-serif;">COLABORADORES INSTITUCIONALES</h2>
                    <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 15px;">
                        @foreach($colaboradores as $sponsor)
                            <div style="background: #fff; padding: 15px; border-radius: 8px; text-align: center; width: 150px; border: 1px solid #eaeaea;">
                                <a href="{{ $sponsor->enlace ?? '#' }}" {{ $sponsor->enlace ? 'target="_blank"' : '' }} style="display: block; text-decoration: none;">
                                    <img src="{{ asset('storage/' . $sponsor->logo) }}" alt="Logo {{ $sponsor->nombre }}" style="max-width: 100%; height: 60px; object-fit: contain; margin-bottom: 10px;">
                                    <h5 style="margin: 0; color: #666; font-size: 0.9rem;">{{ $sponsor->nombre }}</h5>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

        @else
            <div style="text-align: center; padding: 40px; border: 2px dashed var(--borde-color); border-radius: 8px;">
                <i class="fa-solid fa-store" style="font-size: 3rem; color: var(--texto-secundario); margin-bottom: 15px;"></i>
                <h3 style="color: var(--texto-principal);">Espacio Disponible</h3>
                <p style="color: var(--texto-secundario);">Aún estamos preparando la lista de patrocinadores de esta temporada. ¡Sé el primero en aparecer aquí!</p>
            </div>
        @endif
    </section>
@endsection