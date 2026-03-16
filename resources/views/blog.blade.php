@extends('layouts.app')

@section('title', 'Blog y Noticias - Úbeda Atlantes')

@section('seo')
    <meta name="description" content="Noticias, resultados y crónicas de los partidos del Club de Rugby Úbeda Atlantes. Entérate de toda la actualidad de nuestro equipo en Jaén.">
    <meta name="keywords" content="blog rugby, noticias rugby úbeda, crónicas rugby, actualidad ubeda atlantes, liga rugby jaen, andalucia">
    <meta name="author" content="Club de Rugby Úbeda Atlantes">
    <meta name="robots" content="index, follow">

    <meta property="og:title" content="Blog y Noticias - Úbeda Atlantes">
    <meta property="og:description" content="Noticias, resultados y crónicas de los partidos del Club de Rugby Úbeda Atlantes. Entérate de toda la actualidad de nuestro equipo en Jaén.">
    <meta property="og:image" content="{{ asset('images/principal.jpg') }}">
    <meta property="og:url" content="{{ route('blog') }}">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Blog y Noticias - Úbeda Atlantes">
    <meta name="twitter:description" content="Noticias, resultados y crónicas de los partidos del Club de Rugby Úbeda Atlantes. Entérate de toda la actualidad de nuestro equipo en Jaén.">
    <meta name="twitter:image" content="{{ asset('images/principal.jpg') }}">

    <link rel="canonical" href="{{ route('blog') }}">
@endsection

@section('nav-blog', 'active')

@section('styles')
<style>
    /* ESTILO MASONRY (MURO ADAPTATIVO TIPO PINTEREST) */
    .masonry-grid {
        column-count: 3;
        column-gap: 30px;
        max-width: 1200px;
        margin: 60px auto;
        padding: 0 20px;
    }
    
    .masonry-item {
        break-inside: avoid;
        margin-bottom: 30px;
        background: var(--bg-secundario);
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        display: flex;
        flex-direction: column;
        transition: transform 0.3s ease;
    }

    .masonry-item:hover {
        transform: translateY(-5px);
    }

    .masonry-img {
        width: 100%;
        height: auto;
        max-height: 500px;
        object-fit: cover;
        cursor: pointer;
        transition: opacity 0.3s ease;
    }

    .masonry-img:hover {
        opacity: 0.8;
    }

    /* Adaptación a móviles */
    @media (max-width: 900px) { .masonry-grid { column-count: 2; } }
    @media (max-width: 600px) { .masonry-grid { column-count: 1; } }

    /* ESTILOS DEL MODAL (PANTALLA COMPLETA PARA LA FOTO) */
    .modal-galeria {
        display: none; 
        position: fixed; 
        z-index: 9999; 
        padding-top: 50px; 
        left: 0; 
        top: 0; 
        width: 100%; 
        height: 100%; 
        background-color: rgba(0,0,0,0.9);
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    
    .modal-contenido {
        max-width: 90%;
        max-height: 80vh;
        border-radius: 4px;
        box-shadow: 0 0 20px rgba(255,255,255,0.1);
        object-fit: contain;
    }

    .cerrar-modal {
        position: absolute;
        top: 20px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
    }

    .cerrar-modal:hover { color: var(--rojo-pasion); }
</style>
@endsection

@section('content')
    <section class="hero" style="--bg-img: url('{{ asset('images/principal.jpg') }}'); min-height: 40vh;">
        <h1 style="text-transform: uppercase; font-size: 3rem;"><i class="fa-solid fa-newspaper"></i> LA CRÓNICA DEL CLUB</h1>
        <p>Noticias, resultados y el día a día del Úbeda Atlantes.</p>
    </section>

    <section style="min-height: 40vh;">
        @if($posts->count() > 0)
            <div class="masonry-grid">
                @foreach($posts as $post)
                    <div class="masonry-item">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="masonry-img" onclick="abrirModal('{{ asset('storage/' . $post->image) }}')">
                        
                        <div style="padding: 20px; display: flex; flex-direction: column;">
                            <span style="color: var(--rojo-pasion); font-size: 0.85rem; font-weight: bold; margin-bottom: 10px;"><i class="fa-regular fa-calendar"></i> {{ $post->created_at->format('d/m/Y') }}</span>
                            <h2 style="margin-top: 0; margin-bottom: 10px; color: var(--texto-principal); font-family: 'Oswald', sans-serif; font-size: 1.5rem;">{{ $post->title }}</h2>
                            <p style="color: var(--texto-secundario); font-size: 0.95rem; line-height: 1.5; margin-bottom: 20px;">
                                {{ $post->content }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div style="margin-top: 40px; margin-bottom: 60px; display: flex; justify-content: center;">
                {{ $posts->links() }}
            </div>
        @else
            <div style="text-align: center; max-width: 800px; margin: 60px auto; padding: 60px 20px; border: 2px dashed var(--borde-color); border-radius: 8px;">
                <i class="fa-regular fa-folder-open" style="font-size: 4rem; color: var(--texto-secundario); margin-bottom: 20px;"></i>
                <h2 style="color: var(--texto-principal);">AÚN NO HAY NOTICIAS</h2>
                <p style="color: var(--texto-secundario);">El Míster todavía no ha publicado ninguna crónica de partido.</p>
            </div>
        @endif
    </section>

    <div id="modalGaleria" class="modal-galeria">
        <span class="cerrar-modal" onclick="cerrarModal()">&times;</span>
        <img class="modal-contenido" id="imgModal">
    </div>
@endsection

@section('scripts')
<script>
    function abrirModal(src) {
        document.getElementById("modalGaleria").style.display = "flex";
        document.getElementById("imgModal").src = src;
    }
    function cerrarModal() { document.getElementById("modalGaleria").style.display = "none"; }
    window.onclick = function(e) { if(e.target == document.getElementById("modalGaleria")) cerrarModal(); }
    document.addEventListener('keydown', function(e){ if(e.key === "Escape") cerrarModal(); });
</script>
@endsection