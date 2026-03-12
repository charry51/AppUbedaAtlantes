<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @yield('seo')

    <title>@yield('title', 'Club de Rugby Úbeda Atlantes')</title>

    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&family=Oswald:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @yield('styles')
</head>

<body>

    {{-- NAVBAR --}}
    <nav class="navbar">
        <a href="{{ url('/') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Escudo Atlantes" class="nav-logo">
        </a>

        @hasSection('navbar-full')
            <button class="menu-toggle" id="menu-toggle">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="nav-links" id="nav-links">
                <a href="{{ url('/') }}#valores">El Club</a>
                <a href="{{ route('blog') }}" @yield('nav-blog')>Blog</a>
                <a href="{{ route('galeria') }}" @yield('nav-galeria')>Galería</a>
                <a href="{{ url('/') }}#horarios">Horarios</a>
                <a href="{{ url('/') }}#contacto" class="btn-nav">¡Apúntate!</a>
            </div>
        @else
            {{-- Navbar simple para páginas legales y documentación --}}
        @endif

        <div class="social-icons">
            <button id="btn-tema" class="btn-tema" title="Cambiar modo claro/oscuro">
                <i class="fa-solid fa-sun" id="icono-tema"></i>
            </button>
        </div>
    </nav>

    {{-- CONTENIDO PRINCIPAL --}}
    @yield('content')

    {{-- FOOTER --}}
    @hasSection('no-footer')
    @else
    <footer class="footer-club">
        <div class="footer-container">
            <div class="footer-col">
                <h3>DÓNDE ESTAMOS</h3>
                <p><strong>Entrenamientos:</strong><br>Polideportivo Municipal Antonio Cruz Sánchez<br>Úbeda, Jaén</p>
                <div class="social-footer">
                    <a href="https://www.facebook.com/UbedaAtlantesRugbyClub?locale=es_ES" target="_blank">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="https://www.instagram.com/rugbyubedaatlantes/" target="_blank">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="https://www.youtube.com/@ubedaatlantes" target="_blank" title="Canal de YouTube">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                </div>
            </div>
            <div class="footer-col">
                <h3>CONTACTO Y LEGAL</h3>
                <p><strong>Teléfono:</strong> 652 02 77 84</p>
                <ul class="footer-links">
                    <li><a href="{{ route('privacidad') }}">Política de Privacidad</a></li>
                    <li><a href="{{ route('aviso-legal') }}">Aviso Legal</a></li>
                    <li><a href="{{ route('cookies') }}">Política de Cookies</a></li>
                    <li><a href="{{ route('documentacion') }}" class="link-destacado">
                        <i class="fa-solid fa-file-lines"></i> Documentación del Proyecto
                    </a></li>
                </ul>
            </div>
        </div>
        <div style="text-align: center; padding: 20px 10px; font-size: 14px; color: #aaa; background-color: #111; margin-top: 40px; border-top: 1px solid #333;">
            <p style="margin: 0; display: flex; align-items: center; justify-content: center; gap: 8px;">
                Diseño y Desarrollo Web por
                <a href="https://www.linkedin.com/in/fcharriel" target="_blank"
                    style="color: #08d7ea; text-decoration: none; font-weight: bold; transition: color 0.3s ease; display: inline-flex; align-items: center; gap: 8px;">
                    Francisco Charriel
                    <img src="{{ asset('images/Milogo.png') }}" alt="Logo Francisco Charriel"
                        style="height: 24px; width: auto; object-fit: contain;">
                </a>
            </p>
        </div>
    </footer>
    @endif

    {{-- SCRIPTS COMUNES --}}
    <script>
        // --- 1. LÓGICA DEL TEMA CLARO/OSCURO ---
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

        // --- 2. LÓGICA DEL MENÚ HAMBURGUESA ---
        const menuToggle = document.getElementById('menu-toggle');
        const navLinks = document.getElementById('nav-links');
        if (menuToggle && navLinks) {
            menuToggle.addEventListener('click', () => {
                navLinks.classList.toggle('active');
                const iconoMenu = menuToggle.querySelector('i');
                iconoMenu.classList.toggle('fa-bars');
                iconoMenu.classList.toggle('fa-xmark');
            });

            // Cerrar el menú al hacer clic en un enlace (en móviles)
            document.querySelectorAll('.nav-links a').forEach(link => {
                link.addEventListener('click', () => {
                    navLinks.classList.remove('active');
                    menuToggle.querySelector('i').classList.replace('fa-xmark', 'fa-bars');
                });
            });
        }
    </script>

    @yield('scripts')

</body>

</html>
