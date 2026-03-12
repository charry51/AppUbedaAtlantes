@extends('layouts.app')

@section('title', 'Galería - Úbeda Atlantes')

@section('seo')
    <meta name="description" content="Galería de fotos del Club de Rugby Úbeda Atlantes. Repasa los mejores momentos, partidos y terceros tiempos del club.">
    <meta name="keywords" content="fotos rugby, galería rugby úbeda, imágenes equipo rugby, ubeda atlantes fotos, deporte jaen">
    <meta name="author" content="Club de Rugby Úbeda Atlantes">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="Galería de Fotos - Úbeda Atlantes">
    <meta property="og:description" content="Galería de fotos del Club de Rugby Úbeda Atlantes. Repasa los mejores momentos, partidos y terceros tiempos del club.">
    <meta property="og:image" content="{{ asset('images/principal.jpg') }}">
    <meta property="og:url" content="{{ route('galeria') }}">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Galería de Fotos - Úbeda Atlantes">
    <meta name="twitter:description" content="Galería de fotos del Club de Rugby Úbeda Atlantes. Repasa los mejores momentos, partidos y terceros tiempos del club.">
    <meta name="twitter:image" content="{{ asset('images/principal.jpg') }}">
    <link rel="canonical" href="{{ route('galeria') }}">
@endsection

{{-- Marca el enlace "Galería" en la navegación --}}
@section('nav-galeria') style="color: var(--rojo-pasion);" @endsection

@section('navbar-full') @endsection

@section('content')
    <header class="galeria-header">
        <h1><i class="fa-solid fa-camera-retro" style="color: var(--rojo-pasion);"></i> NUESTRA HISTORIA</h1>
        <p>Repasa los mejores momentos, partidos y terceros tiempos del club.</p>

        @if($seasons->count() > 0)
        <form action="{{ route('galeria') }}" method="GET" class="selector-temporada">
            <select name="temporada" onchange="this.form.submit()">
                @foreach($seasons as $season)
                <option value="{{ $season->id }}" {{ ($temporadaActiva && $temporadaActiva->id == $season->id) ? 'selected' : '' }}>
                    {{ $season->name }}
                </option>
                @endforeach
            </select>
        </form>
        @endif
    </header>

    <main style="min-height: 50vh;">
        @if($temporadaActiva && $temporadaActiva->events->count() > 0)
        @foreach($temporadaActiva->events as $evento)
        <div class="evento-container">
            <h2 class="evento-titulo"><i class="fa-solid fa-trophy"></i> {{ $evento->name }}</h2>
            <div class="grid-fotos">
                @foreach($evento->photos as $foto)
                <img src="{{ asset('storage/' . $foto->image_path) }}" alt="Foto de {{ $evento->name }}" loading="lazy">
                @endforeach
            </div>
        </div>
        @endforeach
        @else
        <div class="galeria-empty">
            <h2><i class="fa-regular fa-images" style="font-size: 3rem; margin-bottom: 20px;"></i></h2>
            <h2>AÚN NO HAY FOTOS</h2>
            <p>El Míster no ha subido ningún álbum para esta temporada todavía.</p>
        </div>
        @endif
    </main>

    <div id="lightbox" class="lightbox-modal">
        <span class="lightbox-close">&times;</span>
        <img class="lightbox-content" id="lightbox-img">
    </div>
@endsection

@section('scripts')
<script>
    // LÓGICA DEL LIGHTBOX (FOTOS EN GRANDE)
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    const galeriaImgs = document.querySelectorAll('.grid-fotos img');
    const closeBtn = document.querySelector('.lightbox-close');

    galeriaImgs.forEach(img => {
        img.addEventListener('click', function () {
            lightbox.style.display = 'flex';
            lightboxImg.src = this.src;
            document.body.style.overflow = 'hidden';
        });
    });

    closeBtn.addEventListener('click', () => {
        lightbox.style.display = 'none';
        document.body.style.overflow = 'auto';
    });

    lightbox.addEventListener('click', (e) => {
        if (e.target === lightbox) {
            lightbox.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === "Escape" && lightbox.style.display === 'flex') {
            lightbox.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
    });
</script>
@endsection