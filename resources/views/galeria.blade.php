@extends('layouts.app')

@section('title', 'Galería de Fotos - Úbeda Atlantes')

@section('nav-galeria', 'active')

@section('content')
    <section class="hero" style="--bg-img: url('{{ asset('images/principal.jpg') }}'); min-height: 40vh;">
        <h1 style="text-transform: uppercase; font-size: 3rem;"><i class="fa-solid fa-camera-retro"></i> GALERÍA DEL CLUB</h1>
        <p>Revive los mejores momentos de nuestros Atlantes en el campo.</p>
    </section>

    <section style="min-height: 50vh; background-color: var(--bg-principal); padding: 40px 0;">
        
        <div style="max-width: 1000px; margin: 0 auto 30px auto; padding: 0 20px; display: flex; justify-content: flex-end;">
            <form action="{{ route('galeria') }}" method="GET" id="filtroTemporada" style="display: flex; flex-direction: column; align-items: flex-end;">
                <label for="season_id" style="color: white; font-family: 'Oswald', sans-serif; text-transform: uppercase; font-size: 1.1rem; margin-bottom: 8px;">Filtrar por Temporada:</label>
                <div style="position: relative;">
                    <select name="season_id" id="season_id" style="appearance: none; background: #111; color: white; border: 1px solid #444; border-radius: 4px; padding: 12px 40px 12px 15px; font-family: inherit; font-size: 1rem; cursor: pointer; min-width: 200px; outline: none; transition: border-color 0.3s;" onchange="document.getElementById('filtroTemporada').submit();" onfocus="this.style.borderColor='var(--rojo-pasion)'" onblur="this.style.borderColor='#444'">
                        <option value="">Todas las temporadas</option>
                        @if(isset($seasons))
                            @foreach($seasons as $season)
                                <option value="{{ $season->id }}" {{ request('season_id') == $season->id ? 'selected' : '' }}>
                                    {{ $season->name }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                    <i class="fa-solid fa-chevron-down" style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); color: var(--rojo-pasion); pointer-events: none;"></i>
                </div>
            </form>
        </div>

        <div style="max-width: 1000px; margin: 0 auto; padding: 0 20px;">
            @forelse($events as $event)
                <details style="background: #111; margin-bottom: 15px; border-radius: 6px; border: 1px solid #333; overflow: hidden; transition: all 0.3s ease;" class="acordeon-evento">
                    <summary style="padding: 25px 20px; font-family: 'Oswald', sans-serif; font-size: 1.4rem; color: white; cursor: pointer; display: flex; flex-direction: column; list-style: none; outline: none; position: relative;">
                        <span style="text-transform: uppercase; margin-bottom: 5px; padding-right: 30px;">{{ $event->name }}</span>
                        <span style="font-size: 0.9rem; color: #888; font-family: 'Montserrat', sans-serif;"><i class="fa-regular fa-image" style="color: var(--rojo-pasion);"></i> {{ $event->photos->count() }} imágenes en este álbum</span>
                        <i class="fa-solid fa-chevron-down icono-acordeon" style="position: absolute; right: 25px; top: 40%; color: #888; transition: transform 0.3s;"></i>
                    </summary>
                    
                    <div style="padding: 20px; border-top: 1px solid #222; display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 15px; background: #0a0a0a;">
                        @foreach($event->photos as $photo)
                            <div style="aspect-ratio: 1 / 1; overflow: hidden; border-radius: 4px;">
                                <img src="{{ asset('storage/' . $photo->image_path) }}" alt="Foto del evento {{ $event->name }}" style="width: 100%; height: 100%; object-fit: cover; cursor: pointer; transition: transform 0.3s ease, opacity 0.3s ease;" class="foto-galeria" onclick="abrirModal('{{ asset('storage/' . $photo->image_path) }}')" onmouseover="this.style.transform='scale(1.08)'; this.style.opacity='0.8'" onmouseout="this.style.transform='scale(1)'; this.style.opacity='1'">
                            </div>
                        @endforeach
                    </div>
                </details>
            @empty
                <div style="text-align: center; padding: 60px 20px; border: 2px dashed #333; border-radius: 8px;">
                    <i class="fa-solid fa-camera-retro" style="font-size: 4rem; color: #444; margin-bottom: 20px; display: block;"></i>
                    <h2 style="color: white; font-family: 'Oswald', sans-serif;">AÚN NO HAY FOTOS</h2>
                    <p style="color: #888;">No se han encontrado álbumes para esta temporada.</p>
                </div>
            @endforelse
        </div>
    </section>

    <div id="modalGaleria" style="display: none; position: fixed; z-index: 9999; padding-top: 50px; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.95); justify-content: center; align-items: center; flex-direction: column;">
        <span onclick="cerrarModal()" style="position: absolute; top: 20px; right: 35px; color: #f1f1f1; font-size: 40px; font-weight: bold; cursor: pointer; transition: 0.3s; z-index: 10000;" onmouseover="this.style.color='var(--rojo-pasion)'" onmouseout="this.style.color='#f1f1f1'">&times;</span>
        <img id="imgModal" style="max-width: 90%; max-height: 80vh; border-radius: 4px; box-shadow: 0 0 30px rgba(0,0,0,0.5); object-fit: contain;">
    </div>

    <style>
        /* CSS para ocultar la flecha por defecto de details y animar la nuestra */
        details > summary::-webkit-details-marker { display: none; }
        details[open] .icono-acordeon { transform: rotate(180deg); color: var(--rojo-pasion); }
    </style>

    <script>
        function abrirModal(src) {
            document.getElementById("modalGaleria").style.display = "flex";
            document.getElementById("imgModal").src = src;
            document.body.style.overflow = "hidden"; // Bloquea el scroll del fondo
        }
        function cerrarModal() { 
            document.getElementById("modalGaleria").style.display = "none"; 
            document.body.style.overflow = "auto"; 
        }
        window.onclick = function(e) { if(e.target == document.getElementById("modalGaleria")) cerrarModal(); }
        document.addEventListener('keydown', function(e){ if(e.key === "Escape") cerrarModal(); });
    </script>
@endsection