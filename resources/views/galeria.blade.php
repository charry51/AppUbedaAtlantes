<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería - Úbeda Atlantes</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&family=Oswald:wght@500;700&display=swap"
        rel="stylesheet">
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
            <button id="btn-tema" class="btn-tema" title="Cambiar modo"><i class="fa-solid fa-sun"
                    id="icono-tema"></i></button>
        </div>
    </nav>

    <header class="galeria-header">
        <h1><i class="fa-solid fa-camera-retro" style="color: var(--rojo-pasion);"></i> NUESTRA HISTORIA</h1>
        <p>Repasa los mejores momentos, partidos y terceros tiempos del club.</p>

        @if($seasons->count() > 0)
        <form action="{{ route('galeria') }}" method="GET" class="selector-temporada">
            <select name="temporada" onchange="this.form.submit()">
                @foreach($seasons as $season)
                <option value="{{ $season->id }}" {{ ($temporadaActiva && $temporadaActiva->id == $season->id) ?
                    'selected' : '' }}>
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

    <footer class="footer-club">
        <div class="footer-container">
            <div class="footer-col">
                <h3>DÓNDE ESTAMOS</h3>
                <p><strong>Entrenamientos:</strong><br>Polideportivo Municipal Antonio Cruz Sánchez<br>Úbeda, Jaén</p>

                <div class="social-footer">
                    <a href="https://www.facebook.com/UbedaAtlantesRugbyClub?locale=es_ES" target="_blank"><i
                            class="fa-brands fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/rugbyubedaatlantes/" target="_blank"><i
                            class="fa-brands fa-instagram"></i></a>
                    <a href="https://www.youtube.com/@ubedaatlantes" target="_blank" title="Canal de YouTube"><i
                            class="fa-brands fa-youtube"></i></a>
                </div>
            </div>

            <div class="footer-col">
                <h3>CONTACTO Y LEGAL</h3>
                <p><strong>Teléfono:</strong> 652 02 77 84</p>
                <ul class="footer-links">
                    <li><a href="{{ route('privacidad') }}">Política de Privacidad</a></li>
                    <li><a href="{{ route('aviso-legal') }}">Aviso Legal</a></li>
                    <li><a href="{{ route('cookies') }}">Política de Cookies</a></li>
                    <li><a href="{{ route('documentacion') }}" class="link-destacado"><i
                                class="fa-solid fa-file-lines"></i> Documentación del Proyecto</a></li>
                </ul>
            </div>
        </div>
        <div
            style="text-align: center; padding: 20px 10px; font-size: 14px; color: #aaa; background-color: #111; margin-top: 40px; border-top: 1px solid #333;">
            <p style="margin: 0;">
                Diseño y Desarrollo Web por
                <a href="https://www.linkedin.com/in/fcharriel" target="_blank"
                    style="color: #08d7ea; text-decoration: none; font-weight: bold; transition: color 0.3s ease;">
                    Francisco Charriel
                </a>
            </p>
        </div>
    </footer>

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

        // =========================================
        // LÓGICA DEL LIGHTBOX (FOTOS EN GRANDE)
        // =========================================
        const lightbox = document.getElementById('lightbox');
        const lightboxImg = document.getElementById('lightbox-img');
        const galeriaImgs = document.querySelectorAll('.grid-fotos img');
        const closeBtn = document.querySelector('.lightbox-close');

        // 1. Al hacer clic en cualquier foto de la galería
        galeriaImgs.forEach(img => {
            img.addEventListener('click', function () {
                lightbox.style.display = 'flex'; // Mostramos el fondo negro
                lightboxImg.src = this.src;      // Le pasamos la ruta de la foto exacta
                document.body.style.overflow = 'hidden'; // Bloqueamos el scroll de la página trasera
            });
        });

        // 2. Cerrar al darle a la X
        closeBtn.addEventListener('click', () => {
            lightbox.style.display = 'none';
            document.body.style.overflow = 'auto'; // Devolvemos el scroll
        });

        // 3. Cerrar al pinchar en cualquier parte del fondo negro (fuera de la foto)
        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) {
                lightbox.style.display = 'none';
                document.body.style.overflow = 'auto';
            }
        });

        // 4. Cerrar al pulsar la tecla ESC (Detalle muy pro para el portfolio)
        document.addEventListener('keydown', (e) => {
            if (e.key === "Escape" && lightbox.style.display === 'flex') {
                lightbox.style.display = 'none';
                document.body.style.overflow = 'auto';
            }
        });
    </script>
</body>

</html>