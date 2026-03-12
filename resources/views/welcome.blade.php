@extends('layouts.app')

@section('title', 'Club de Rugby Úbeda Atlantes')

@section('seo')
    <!-- SEO Básico -->
    <meta name="description" content="Úbeda Atlantes Rugby Club. Equipos masculino y femenino. Únete al rugby en Úbeda. Sangre, sudor y respeto. Conoce nuestros horarios y valores.">
    <meta name="keywords" content="rugby, Úbeda, Jaén, deporte, equipo femenino, equipo masculino, atlantes, tercer tiempo, melé, rugby andalucia">
    <meta name="author" content="Club de Rugby Úbeda Atlantes">
    <meta name="robots" content="index, follow">

    <!-- Open Graph / Redes Sociales -->
    <meta property="og:title" content="Club de Rugby Úbeda Atlantes">
    <meta property="og:description" content="Sangre, sudor y respeto. Bienvenido al club de rugby de Úbeda. Únete a la melé y descubre tu nueva familia.">
    <meta property="og:image" content="{{ asset('images/principal.jpg') }}">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:type" content="website">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Club de Rugby Úbeda Atlantes">
    <meta name="twitter:description" content="Sangre, sudor y respeto. Bienvenido al club de rugby de Úbeda. Únete a la melé y descubre tu nueva familia.">
    <meta name="twitter:image" content="{{ asset('images/principal.jpg') }}">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url('/') }}">
@endsection

@section('styles')
<style>
    html { scroll-behavior: smooth; }
</style>
@endsection

@section('content')

    <section class="hero" style="--bg-img: url('{{ asset('images/principal.jpg') }}');">
        <h1>ÚBEDA ATLANTES</h1>
        <p>Sangre, sudor y respeto. Bienvenidos al club de rugby de Úbeda. Únete a nuestros equipos masculino y femenino y descubre tu nueva familia.</p>
        <a href="#contacto" class="btn-principal">QUIERO PROBAR EL RUGBY</a>
    </section>

    <div class="marcador-banner">
        @if($nextGame)
        <span>PRÓXIMO ENCUENTRO:</span>

        @if($nextGame->es_local)
        <img src="{{ asset('images/logo.png') }}" class="escudo-mini" alt="Úbeda Atlantes">
        <span>VS</span>
        @if($nextGame->rival_logo)
        <img src="{{ asset('storage/' . $nextGame->rival_logo) }}" class="escudo-mini" alt="{{ $nextGame->rival }}">
        @else
        <span style="color: #fff;">{{ $nextGame->rival }}</span>
        @endif
        @else
        @if($nextGame->rival_logo)
        <img src="{{ asset('storage/' . $nextGame->rival_logo) }}" class="escudo-mini" alt="{{ $nextGame->rival }}">
        @else
        <span style="color: #fff;">{{ $nextGame->rival }}</span>
        @endif
        <span>VS</span>
        <img src="{{ asset('images/logo.png') }}" class="escudo-mini" alt="Úbeda Atlantes">
        @endif

        <span><i class="fa-regular fa-calendar"></i> {{ \Carbon\Carbon::parse($nextGame->fecha)->format('d/m/Y - H:i') }}</span>
        <span><i class="fa-solid fa-location-dot"></i> {{ $nextGame->lugar }}</span>
        @else
        <span><i class="fa-solid fa-trophy"></i> TEMPORADA FINALIZADA. PREPARANDO EL SIGUIENTE RETO.</span>
        @endif
    </div>

    @if(isset($upcomingGames) && $upcomingGames->count() > 0)
    <div class="lista-proximos-banner">
        <div class="lista-proximos-titulo">OTROS ENCUENTROS PROGRAMADOS</div>
        <div class="lista-proximos-grid">
            @foreach($upcomingGames as $game)
            <div class="proximo-item">
                <span class="proximo-fecha"><i class="fa-regular fa-calendar"></i> {{ \Carbon\Carbon::parse($game->fecha)->format('d/m/Y') }}</span>
                <span class="proximo-equipos">
                    @if($game->es_local)
                        Atlantes vs {{ $game->rival }}
                    @else
                        {{ $game->rival }} vs Atlantes
                    @endif
                </span>
                <span class="proximo-lugar"><i class="fa-solid fa-location-dot"></i> {{ $game->lugar }}</span>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    <section class="valores reveal" id="valores">
        <div class="valor-caja">
            <i class="fa-solid fa-handshake-angle"></i>
            <h3>RESPETO</h3>
            <p>El árbitro siempre tiene la razón y el rival es nuestro invitado. El rugby se juega duro en el campo y con honor fuera de él.</p>
        </div>
        <div class="valor-caja">
            <i class="fa-solid fa-users"></i>
            <h3>SITIO PARA TODOS</h3>
            <p>Altos, bajos, rápidos o fuertes. En nuestro XV hay una posición diseñada exactamente para tu complexión física.</p>
        </div>
        <div class="valor-caja">
            <i class="fa-solid fa-beer-mug-empty"></i>
            <h3>TERCER TIEMPO</h3>
            <p>Los 80 minutos de guerra terminan con un apretón de manos, comida y bebida compartida con el equipo rival.</p>
        </div>
    </section>

    <section class="identidad-section reveal" id="identidad">
        <h2>NUESTRA PIEL</h2>
        <p>Conoce a nuestros equipos en acción. Más que un club, somos una gran familia en el campo, con secciones masculina y femenina abiertas a todo el mundo.</p>

        <div class="galeria-grid">
            <img src="{{ asset('images/unoimg.jpg') }}" class="foto-identidad" alt="Placaje Atlantes">
            <img src="{{ asset('images/mele.jpg') }}" class="foto-identidad" alt="Melé Atlantes">
            <img src="{{ asset('images/tresimg.jpg') }}" class="foto-identidad" alt="Equipo Atlantes">
        </div>

        <div style="text-align: center; margin-top: 30px;">
            <div style="background: var(--rojo-pasion); color: #fff; padding: 20px; border-radius: 8px; display: inline-block; max-width: 600px;">
                <h3 style="margin-bottom: 10px; font-family: 'Oswald', sans-serif; color: #fff;"><i class="fa-solid fa-venus-mars"></i> DESARROLLO DEL RUGBY FEMENINO</h3>
                <p style="font-size: 0.95rem; line-height: 1.5; color: #fff;">Estamos apostando fuertemente por nuestro equipo Senior Femenino. Buscamos jugadoras con o sin experiencia para sumar fuerza, carácter y pasión a nuestro club. ¡El campo te espera!</p>
            </div>
        </div>
    </section>

    <section class="horarios-section reveal" id="horarios">
        <div class="horarios-container">
            <h2><i class="fa-solid fa-stopwatch"></i> HORARIOS DE ENTRENAMIENTO</h2>
            <p class="subtitulo-horario">Senior Masculino | Senior Femenino | Categorías Inferiores</p>
            <div class="dias-grid">
                <div class="dia-card">
                    <h3>LUNES</h3>
                    <p class="hora">19:00 - 20:30</p>
                    <p class="lugar"><i class="fa-solid fa-location-dot"></i> Polideportivo Municipal Antonio Cruz Sánchez</p>
                    <p class="campo-destacado">CAMPO F4</p>
                </div>
                <div class="dia-card">
                    <h3>MIÉRCOLES</h3>
                    <p class="hora">19:00 - 21:00</p>
                    <p class="lugar"><i class="fa-solid fa-location-dot"></i> Polideportivo Municipal Antonio Cruz Sánchez</p>
                    <p class="campo-destacado">CAMPO F5</p>
                </div>
            </div>
            <p class="nota-horario">
                <i class="fa-solid fa-circle-info"></i> ¡Llega 15 minutos antes para calentar! No necesitas botas de tacos para tu primer día, con ropa deportiva cómoda y zapatillas es suficiente.
            </p>
        </div>
    </section>

    <section id="medios" class="medios-section reveal">
        <h2 class="section-title">EL CLUB EN LOS MEDIOS</h2>
        <p style="color: var(--texto-secundario); max-width: 600px; margin: 0 auto 40px;">
            Apariciones en televisión, prensa local y reportajes sobre nuestros torneos solidarios.
        </p>
        <div class="medios-grid">
            <div class="medio-card">
                <div class="medio-icon"><i class="fa-solid fa-tv"></i></div>
                <h3 class="medio-titulo">Deportes Diez TV</h3>
                <p class="medio-texto">Aparición en el programa Deportes Diez TV repasando la actualidad y los últimos eventos solidarios de nuestro club.</p>
                <a href="https://www.youtube.com/watch?v=Iswz004-Cno&t=1833s" target="_blank" class="btn-medio"><i class="fa-solid fa-play"></i> Ver Reportaje</a>
            </div>
            <div class="medio-card">
                <div class="medio-icon"><i class="fa-regular fa-newspaper"></i></div>
                <h3 class="medio-titulo">Copa Tierras de Jaén</h3>
                <p class="medio-texto">Noticia en 9LaLoma.tv sobre cómo el club impulsa el rugby en la provincia con la organización de la Copa Tierras de Jaén.</p>
                <a href="https://9laloma.tv/noticias/2025/05/19/atlantes-ubeda-rugby-club-impulsa-el-rugby-en-la-provincia-con-la-copa-tierras-de-jaen/" target="_blank" class="btn-medio"><i class="fa-solid fa-book-open"></i> Leer Noticia</a>
            </div>
            <div class="medio-card">
                <div class="medio-icon"><i class="fa-brands fa-youtube"></i></div>
                <h3 class="medio-titulo">Reportaje en Vídeo</h3>
                <p class="medio-texto">No te pierdas este reportaje especial en vídeo para vivir desde dentro el ambiente del rugby en Úbeda.</p>
                <a href="https://www.youtube.com/watch?v=1osyMtD7kTQ" target="_blank" class="btn-medio"><i class="fa-brands fa-youtube"></i> Ver Vídeo</a>
            </div>
        </div>
    </section>

    <section class="reclutamiento-section reveal" id="contacto">
        <img src="{{ asset('images/logo.png') }}" class="watermark" alt="Fondo">

        <div class="form-container">
            <h2>ÚNETE AL EQUIPO</h2>
            <p>No necesitas experiencia previa ni material especial. Solo ganas de aprender. Déjanos tus datos y el Míster te escribirá por WhatsApp.</p>

            @if(session('success'))
            <div class="alerta-exito">
                <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
            </div>
            @endif

            <form action="{{ route('contacto.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>NOMBRE Y APELLIDOS</label>
                    <input type="text" name="name" value="{{ old('name') }}" required placeholder="Tu nombre completo">
                    @error('name') <span style="color: #e74c3c; font-size: 0.85rem;">{{ $message }}</span> @enderror
                </div>
                <div class="flex-row">
                    <div class="form-group">
                        <label>TELÉFONO (WHATSAPP)</label>
                        <input type="text" name="phone" value="{{ old('phone') }}" required placeholder="600 000 000">
                        @error('phone') <span style="color: #e74c3c; font-size: 0.85rem;">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label>EDAD</label>
                        <input type="number" name="age" value="{{ old('age') }}" placeholder="Ej: 22" min="5" max="99">
                        @error('age') <span style="color: #e74c3c; font-size: 0.85rem;">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-group" style="margin-bottom: 15px;">
                    <label>¿EN QUÉ EQUIPO ESTÁS INTERESADO/A?</label>
                    <select name="team_interest" style="width: 100%; padding: 12px; background: var(--bg-secundario); border: 1px solid var(--borde-color); color: var(--texto-principal); border-radius: 4px; font-family: inherit;">
                        <option value="Senior Femenino" style="color: #000;" {{ old('team_interest') == 'Senior Femenino' ? 'selected' : '' }}>Senior Femenino</option>
                        <option value="Senior Masculino" style="color: #000;" {{ old('team_interest') == 'Senior Masculino' ? 'selected' : '' }}>Senior Masculino</option>
                        <option value="Categorías Inferiores" style="color: #000;" {{ old('team_interest') == 'Categorías Inferiores' ? 'selected' : '' }}>Categorías Inferiores (Escuela)</option>
                        <option value="No lo sé / Otro" style="color: #000;" {{ old('team_interest', 'No lo sé / Otro') == 'No lo sé / Otro' ? 'selected' : '' }}>No lo sé / Quiero probar</option>
                    </select>
                    @error('team_interest') <span style="color: #e74c3c; font-size: 0.85rem;">{{ $message }}</span> @enderror
                </div>
                <div class="form-group checkbox-experiencia">
                    <input type="checkbox" name="has_experience" id="exp" {{ old('has_experience') ? 'checked' : '' }}>
                    <label for="exp">Ya he jugado al rugby antes</label>
                </div>
                <div class="form-group">
                    <label>¿ALGO QUE DEBAMOS SABER?</label>
                    <textarea name="message" rows="3" placeholder="Ej: Nunca he jugado pero hago pesas...">{{ old('message') }}</textarea>
                </div>
                <button type="submit" class="btn-submit">ENVIAR SOLICITUD <i class="fa-solid fa-arrow-right"></i></button>
            </form>
        </div>
    </section>

    <!-- Banner de cookies -->
    <div id="cookie-banner" class="cookie-banner">
        <p>Esta página web utiliza cookies para mejorar su experiencia. Si continúa navegando asumimos que acepta su uso.</p>
        <button id="btn-aceptar-cookies" class="btn-cookie">Aceptar</button>
    </div>
@endsection

@section('scripts')
<script>
    // BANNER DE COOKIES
    const cookieBanner = document.getElementById('cookie-banner');
    const btnCookies = document.getElementById('btn-aceptar-cookies');
    if (!localStorage.getItem('cookiesAceptadas')) {
        cookieBanner.style.display = 'flex';
    }
    btnCookies.addEventListener('click', () => {
        cookieBanner.style.display = 'none';
        localStorage.setItem('cookiesAceptadas', 'true');
    });

    // ANIMACIÓN REVEAL AL HACER SCROLL
    function reveal() {
        var reveals = document.querySelectorAll(".reveal");
        for (var i = 0; i < reveals.length; i++) {
            var windowHeight = window.innerHeight;
            var elementTop = reveals[i].getBoundingClientRect().top;
            if (elementTop < windowHeight - 100) {
                reveals[i].classList.add("active");
            }
        }
    }
    window.addEventListener("scroll", reveal);
    reveal();
</script>
@endsection