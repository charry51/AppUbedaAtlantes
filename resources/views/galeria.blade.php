<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería - Úbeda Atlantes</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&family=Oswald:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <nav class="navbar">
        <a href="{{ url('/') }}"><img src="{{ asset('images/logo.png') }}" alt="Escudo Atlantes" class="nav-logo"></a>
        <button class="menu-toggle" id="menu-toggle"><i class="fa-solid fa-bars"></i></button>
        
        <div class="nav-links" id="nav-links">
            <a href="{{ url('/') }}#valores">El Club</a>
            <a href="{{ route('blog') }}">Blog</a>
            <a href="{{ route('galeria') }}" style="color: var(--rojo-pasion);">Galería</a>
            <a href="{{ url('/') }}#horarios">Horarios</a>
            <a href="{{ url('/') }}#contacto" class="btn-nav">¡Apúntate!</a>
        </div>
        <div class="social-icons">
            <button id="btn-tema" class="btn-tema" title="Cambiar modo"><i class="fa-solid fa-sun" id="icono-tema"></i></button>
        </div>
    </nav>

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

    <script>
        const btnTema = document.getElementById('btn-tema');
        const iconoTema = document.getElementById('icono-tema');
        const cuerpoWeb = document.body;

        if (localStorage.getItem('temaElegido') === 'claro') {
            cuerpoWeb.classList.add('modo-claro');
            iconoTema.classList.replace('fa-sun', 'fa-moon');
        }

        btnTema.addEventListener('click', () => {
            cuerpoWeb.classList.toggle('modo-claro');
            if (cuerpoWeb.classList.contains('modo-claro')) {
                localStorage.setItem('temaElegido', 'claro');
                iconoTema.classList.replace('fa-sun', 'fa-moon');
            } else {
                localStorage.setItem('temaElegido', 'oscuro');
                iconoTema.classList.replace('fa-moon', 'fa-sun');
            }
        });

        const menuToggle = document.getElementById('menu-toggle');
        const navLinks = document.getElementById('nav-links');
        menuToggle.addEventListener('click', () => {
            navLinks.classList.toggle('active');
            const iconoMenu = menuToggle.querySelector('i');
            iconoMenu.classList.toggle('fa-bars');
            iconoMenu.classList.toggle('fa-xmark');
        });
    </script>
</body>
</html>