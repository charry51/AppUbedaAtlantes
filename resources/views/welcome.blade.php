@extends('layouts.app')

@section('title', 'Club de Rugby Úbeda Atlantes')

@section('seo')
    <meta name="description" content="Úbeda Atlantes Rugby Club. Equipos masculino y femenino. Únete al rugby en Úbeda. Sangre, sudor y respeto. Conoce nuestros horarios y valores.">
    <meta name="keywords" content="rugby, Úbeda, Jaén, deporte, equipo femenino, equipo masculino, atlantes, tercer tiempo, melé, rugby andalucia">
    <meta name="author" content="Club de Rugby Úbeda Atlantes">
    <meta name="robots" content="index, follow">

    <meta property="og:title" content="Club de Rugby Úbeda Atlantes">
    <meta property="og:description" content="Sangre, sudor y respeto. Bienvenido al club de rugby de Úbeda. Únete a la melé y descubre tu nueva familia.">
    <meta property="og:image" content="{{ asset('images/principal.jpg') }}">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Club de Rugby Úbeda Atlantes">
    <meta name="twitter:description" content="Sangre, sudor y respeto. Bienvenido al club de rugby de Úbeda. Únete a la melé y descubre tu nueva familia.">
    <meta name="twitter:image" content="{{ asset('images/principal.jpg') }}">

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
        <a href="{{ route('contacto') }}" class="btn-principal">QUIERO PROBAR EL RUGBY</a>
    </section>

    <div class="marcador-banner">
        @if($nextGame)
            @if($nextGame->tipo == 'torneo')
                <span><i class="fa-solid fa-trophy"></i> {{ $nextGame->nombre_torneo }}</span>
            @else
                <span>PRÓXIMO ENCUENTRO:</span>
                @if($nextGame->es_local)
                    <img src="{{ asset('images/logo.png') }}" class="escudo-mini" alt="Atlantes">
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
                    <img src="{{ asset('images/logo.png') }}" class="escudo-mini" alt="Atlantes">
                @endif
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
                    @if($game->tipo == 'torneo')
                        {{ $game->nombre_torneo }}
                    @else
                        @if($game->es_local) Atlantes vs {{ $game->rival }} @else {{ $game->rival }} vs Atlantes @endif
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
        <div class="medios-grid">
            <div class="medio-card">
                <div class="medio-icon"><i class="fa-solid fa-tv"></i></div>
                <h3 class="medio-titulo">Deportes Diez TV</h3>
                <p class="medio-texto">Aparición en el programa Deportes Diez TV repasando la actualidad y los últimos eventos solidarios.</p>
                <a href="https://www.youtube.com/watch?v=Iswz004-Cno&t=1833s" target="_blank" class="btn-medio"><i class="fa-solid fa-play"></i> Ver Reportaje</a>
            </div>
            <div class="medio-card">
                <div class="medio-icon"><i class="fa-regular fa-newspaper"></i></div>
                <h3 class="medio-titulo">Copa Tierras de Jaén</h3>
                <p class="medio-texto">Noticia sobre cómo el club impulsa el rugby en la provincia con la organización de la Copa Tierras de Jaén.</p>
                <a href="https://9laloma.tv/noticias/2025/05/19/atlantes-ubeda-rugby-club-impulsa-el-rugby-en-la-provincia-con-la-copa-tierras-de-jaen/" target="_blank" class="btn-medio"><i class="fa-solid fa-book-open"></i> Leer Noticia</a>
            </div>
            <div class="medio-card">
                <div class="medio-icon"><i class="fa-brands fa-youtube"></i></div>
                <h3 class="medio-titulo">Reportaje en Vídeo</h3>
                <p class="medio-texto">Vive desde dentro el ambiente del rugby en Úbeda con este reportaje especial.</p>
                <a href="https://www.youtube.com/watch?v=1osyMtD7kTQ" target="_blank" class="btn-medio"><i class="fa-brands fa-youtube"></i> Ver Vídeo</a>
            </div>
        </div>
    </section>

    <div id="cookie-banner" class="cookie-banner">
        <p>Esta página web utiliza cookies para mejorar su experiencia. Si continúa navegando asumimos que acepta su uso.</p>
        <button id="btn-aceptar-cookies" class="btn-cookie">Aceptar</button>
    </div>
@endsection

@section('scripts')
<script>
    const cookieBanner = document.getElementById('cookie-banner');
    const btnCookies = document.getElementById('btn-aceptar-cookies');
    if (!localStorage.getItem('cookiesAceptadas')) {
        cookieBanner.style.display = 'flex';
    }
    btnCookies.addEventListener('click', () => {
        cookieBanner.style.display = 'none';
        localStorage.setItem('cookiesAceptadas', 'true');
    });

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