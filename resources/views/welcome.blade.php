<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club de Rugby Úbeda Atlantes</title>
    
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&family=Oswald:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="#"><img src="{{ asset('images/logo.png') }}" alt="Escudo Atlantes" class="nav-logo"></a>
        
        <div class="nav-links">
            <a href="#valores">El Club</a>
            <a href="#identidad">Nuestra Piel</a>
            <a href="#horarios">Horarios</a>
            <a href="#contacto" class="btn-nav">¡Apúntate!</a>
        </div>

        <div class="social-icons">
            <a href="https://www.facebook.com/UbedaAtlantesRugbyClub?locale=es_ES" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/rugbyubedaatlantes/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
            
            <button id="btn-tema" class="btn-tema" title="Cambiar modo claro/oscuro">
                <i class="fa-solid fa-sun" id="icono-tema"></i>
            </button>
        </div>
    </nav>

    <section class="hero" style="background: linear-gradient(to bottom, rgba(0,0,0,0.4), var(--bg-principal)), url('{{ asset('images/principal.jpg') }}'); background-size: cover; background-position: center;">
        <h1>ÚBEDA ATLANTES</h1>
        <p>Sangre, sudor y respeto. Bienvenido al club de rugby de Úbeda. Únete a la melé y descubre tu nueva familia.</p>
        <a href="#contacto" class="btn-principal">QUIERO PROBAR EL RUGBY</a>
    </section>

    <div class="marcador-banner">
        @if($nextGame)
            <span>PRÓXIMO ENCUENTRO:</span>
            
            @if($nextGame->es_local)
                <img src="{{ asset('images/logo.png') }}" class="escudo-mini" alt="Úbeda Atlantes">
                <span>VS</span>
                @if($nextGame->rival_logo)
                    <img src="{{ asset('images/' . $nextGame->rival_logo) }}" class="escudo-mini" alt="{{ $nextGame->rival }}">
                @else
                    <span style="color: #fff;">{{ $nextGame->rival }}</span>
                @endif
            @else
                @if($nextGame->rival_logo)
                    <img src="{{ asset('images/' . $nextGame->rival_logo) }}" class="escudo-mini" alt="{{ $nextGame->rival }}">
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

    <section class="valores" id="valores">
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

    <section class="identidad-section" id="identidad">
        <h2>NUESTRA PIEL</h2>
        <p>Conoce al equipo en acción. Más que un club, una hermandad en el campo.</p>
        
        <div class="galeria-grid">
            <img src="{{ asset('images/unoimg.jpg') }}" class="foto-identidad" alt="Placaje Atlantes">
            <img src="{{ asset('images/mele.jpg') }}" class="foto-identidad" alt="Melé Atlantes">
            <img src="{{ asset('images/tresimg.jpg') }}" class="foto-identidad" alt="Equipo Atlantes">
        </div>
    </section>

    <section class="horarios-section" id="horarios">
        <div class="horarios-container">
            <h2><i class="fa-solid fa-stopwatch"></i> HORARIOS DE ENTRENAMIENTO</h2>
            
            <p class="subtitulo-horario">
                Senior Masculino | Senior Femenino | Categorías Inferiores
            </p>

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

    <section class="reclutamiento-section" id="contacto">
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
                    <input type="text" name="name" required placeholder="Tu nombre completo">
                </div>
                <div class="flex-row">
                    <div class="form-group">
                        <label>TELÉFONO (WHATSAPP)</label>
                        <input type="text" name="phone" required placeholder="600 000 000">
                    </div>
                    <div class="form-group">
                        <label>EDAD</label>
                        <input type="number" name="age" placeholder="Ej: 22">
                    </div>
                </div>
                <div class="form-group checkbox-experiencia">
                    <input type="checkbox" name="has_experience" id="exp">
                    <label for="exp">Ya he jugado al rugby antes</label>
                </div>
                <div class="form-group">
                    <label>¿ALGO QUE DEBAMOS SABER?</label>
                    <textarea name="message" rows="3" placeholder="Ej: Nunca he jugado pero hago pesas..."></textarea>
                </div>
                <button type="submit" class="btn-submit">ENVIAR SOLICITUD <i class="fa-solid fa-arrow-right"></i></button>
            </form>
        </div>
    </section>

    <footer class="footer-club">
        <div class="footer-container">
            <div class="footer-col">
                <h3>DÓNDE ESTAMOS</h3>
                <p><strong>Entrenamientos:</strong><br>Polideportivo Municipal Antonio Cruz Sánchez<br>Úbeda, Jaén</p>
                
                <div class="social-footer">
                    <a href="https://www.facebook.com/UbedaAtlantesRugbyClub?locale=es_ES" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/rugbyubedaatlantes/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                </div>
            </div>

            <div class="footer-col">
                <h3>CONTACTO Y LEGAL</h3>
                <p><strong>Teléfono:</strong> 652 02 77 84</p>
                <ul class="footer-links">
                    <li><a href="{{ route('privacidad') }}">Política de Privacidad</a></li>
                    <li><a href="{{ route('aviso-legal') }}">Aviso Legal</a></li>
                    <li><a href="{{ route('cookies') }}">Política de Cookies</a></li>
                    <li><a href="{{ route('documentacion') }}" class="link-destacado"><i class="fa-solid fa-file-lines"></i> Documentación del Proyecto</a></li>
                </ul>
            </div>
        </div>
        <div style="text-align: center; padding: 20px 10px; font-size: 14px; color: #aaa; background-color: #111; margin-top: 40px; border-top: 1px solid #333;">
    <p style="margin: 0;">
        Diseño y Desarrollo Web por 
        <a href="https://www.linkedin.com/in/fcharriel" target="_blank" style="color: #08d7ea; text-decoration: none; font-weight: bold; transition: color 0.3s ease;">
            Francisco Charriel
        </a>
    </p>
</div>
    </footer>

    <div id="cookie-banner" class="cookie-banner">
        <p>Esta página web utiliza cookies para mejorar su experiencia. Si continúa navegando asumimos que acepta su uso.</p>
        <button id="btn-aceptar-cookies" class="btn-cookie">Aceptar</button>
    </div>

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

        // --- 2. LÓGICA DEL BANNER DE COOKIES ---
        const cookieBanner = document.getElementById('cookie-banner');
        const btnCookies = document.getElementById('btn-aceptar-cookies');

        if (!localStorage.getItem('cookiesAceptadas')) {
            cookieBanner.style.display = 'flex';
        }

        btnCookies.addEventListener('click', () => {
            cookieBanner.style.display = 'none';
            localStorage.setItem('cookiesAceptadas', 'true');
        });
    </script>
</body>
</html>