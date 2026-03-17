@extends('layouts.app')

@section('title', 'Galería de Fotos | Úbeda Atlantes Rugby')

@section('seo')
    <meta name="description" content="Revive los mejores momentos del Úbeda Atlantes. Fotos de partidos, terceros tiempos y eventos solidarios en Úbeda.">
    <meta name="keywords" content="rugby úbeda, atlantes rugby, fotos rugby jaén">
    <meta property="og:title" content="Galería de Fotos | Úbeda Atlantes">
    <meta property="og:description" content="Explora nuestra historia en imágenes. Temporada tras temporada.">
    <meta property="og:image" content="{{ asset('images/principal.jpg') }}">
    <meta property="og:url" content="{{ route('galeria') }}">
    <meta name="twitter:card" content="summary_large_image">
    <link rel="canonical" href="{{ route('galeria') }}">
@endsection

@section('styles')
<style>
    .evento-desplegable { margin-bottom: 15px; background: var(--bg-secundario); border-radius: 8px; border: 1px solid #333; overflow: hidden; }
    .evento-header { display: flex; justify-content: space-between; align-items: center; padding: 20px; cursor: pointer; border-left: 5px solid var(--rojo-pasion); }
    .evento-titulo { font-family: 'Oswald', sans-serif; font-size: 1.3rem; text-transform: uppercase; margin: 0; color: #fff; }
    .evento-contenido { max-height: 0; overflow: hidden; transition: max-height 0.5s ease-out; background: #000; }
    /* Le he quitado el 'abierto' por defecto para que empiecen cerrados */
    .evento-contenido.abierto { max-height: 5000px; padding: 20px; border-top: 1px solid #222; }
    .fotos-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(180px, 1fr)); gap: 15px; }
    .foto-item { aspect-ratio: 1/1; border-radius: 4px; overflow: hidden; cursor: pointer; background: #111; }
    .foto-item img { width: 100%; height: 100%; object-fit: cover; transition: 0.3s; }
    .foto-item:hover img { transform: scale(1.1); }
    #modalGaleria { display: none; position: fixed; z-index: 10000; left: 0; top: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.9); justify-content: center; align-items: center; }
    #imgModal { max-width: 90%; max-height: 85vh; border-radius: 4px; }
    
    /* Estilos para el filtro */
    .filtro-container { max-width: 900px; margin: 20px auto; padding: 0 20px; display: flex; justify-content: flex-end; align-items: center; }
    .filtro-label { color: #fff; font-family: 'Oswald', sans-serif; margin-right: 15px; font-size: 1.1rem; text-transform: uppercase; }
    .filtro-select { padding: 10px 15px; border-radius: 4px; background: #111; color: #fff; border: 1px solid #c91028; font-family: 'Oswald', sans-serif; cursor: pointer; font-size: 1rem; outline: none; }
    .filtro-select:focus { border-color: #fff; }
</style>
@endsection

@section('content')
    <section class="hero" style="--bg-img: url('{{ asset('images/principal.jpg') }}'); min-height: 35vh;">
        <h1 style="text-transform: uppercase;"><i class="fa-solid fa-images"></i> GALERÍA ATLANTE</h1>
        <p>Selecciona un evento para ver las imágenes.</p>
    </section>

    <div class="filtro-container">
        <form action="{{ route('galeria') }}" method="GET" id="filtroTemporada">
            <label for="season_id" class="filtro-label">Filtrar por Temporada:</label>
            <select name="season_id" id="season_id" class="filtro-select" onchange="document.getElementById('filtroTemporada').submit();">
                <option value="">Todas las temporadas</option>
                @if(isset($seasons))
                    @foreach($seasons as $season)
                        <option value="{{ $season->id }}" {{ request('season_id') == $season->id ? 'selected' : '' }}>
                            {{ $season->name }}
                        </option>
                    @endforeach
                @endif
            </select>
        </form>
    </div>

    <div style="max-width: 900px; margin: 0 auto 40px auto; padding: 0 20px;">
        @forelse($events as $event)
            <div class="evento-desplegable">
                <div class="evento-header" onclick="toggleEvento({{ $event->id }})">
                    <div>
                        <h3 class="evento-titulo">{{ $event->name }}</h3>
                        <span style="color: #888; font-size: 0.8rem;">{{ $event->photos->count() }} imágenes en este álbum</span>
                    </div>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
                
                <div class="evento-contenido" id="contenido-{{ $event->id }}">
                    <div class="fotos-grid">
                        @foreach($event->photos as $photo)
                            @if($photo->image_path)
                                <div class="foto-item" onclick="verFoto('{{ asset('storage/' . $photo->image_path) }}')">
                                    <img src="{{ asset('storage/' . $photo->image_path) }}" alt="Rugby Úbeda Atlantes" loading="lazy">
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        @empty
            <div style="text-align: center; color: #666; padding: 50px; background: #111; border-radius: 8px;">
                <p>No hay álbumes de fotos para esta selección.</p>
            </div>
        @endforelse
    </div>

    <div id="modalGaleria" onclick="this.style.display='none'">
        <img id="imgModal">
    </div>
@endsection

@section('scripts')
<script>
    function toggleEvento(id) {
        document.getElementById('contenido-' + id).classList.toggle('abierto');
    }
    function verFoto(src) {
        document.getElementById('modalGaleria').style.display = 'flex';
        document.getElementById('imgModal').src = src;
    }
</script>
@endsection