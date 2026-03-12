<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentación - Úbeda Atlantes</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&family=Oswald:wght@500;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .doc-container {
            max-width: 800px;
            margin: 120px auto 50px auto;
            padding: 40px;
            background-color: var(--bg-secundario);
            border-radius: 8px;
            border: 1px solid var(--borde-color);
        }

        .doc-container h1 {
            color: var(--rojo-pasion);
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 10px;
        }

        .doc-container h2 {
            color: var(--texto-principal);
            font-size: 1.8rem;
            margin-top: 40px;
            border-bottom: 2px solid var(--rojo-pasion);
            padding-bottom: 10px;
        }

        .doc-container h3 {
            color: var(--texto-principal);
            margin-top: 30px;
        }

        .doc-container p,
        .doc-container li {
            line-height: 1.8;
            color: var(--texto-secundario);
            margin-bottom: 15px;
        }

        .doc-container ul,
        .doc-container ol {
            margin-bottom: 20px;
            padding-left: 20px;
        }

        .btn-volver {
            display: inline-block;
            margin-bottom: 20px;
            color: var(--rojo-pasion);
            text-decoration: none;
            font-weight: bold;
        }

        .btn-volver:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <a href="{{ url('/') }}"><img src="{{ asset('images/logo.png') }}" alt="Escudo Atlantes" class="nav-logo"></a>
        <div class="social-icons">
            <button id="btn-tema" class="btn-tema" title="Cambiar modo claro/oscuro"><i class="fa-solid fa-sun"
                    id="icono-tema"></i></button>
        </div>
    </nav>

    <div class="doc-container">
        <a href="{{ url('/') }}" class="btn-volver"><i class="fa-solid fa-arrow-left"></i> Volver a la web</a>

        <h1>Manual de Usuario - Web Úbeda Atlantes Rugby Club</h1>
        <p style="text-align: center; color: var(--texto-secundario);">¡Bienvenido al manual de uso de la página web del <strong>Club de Rugby Úbeda Atlantes</strong>! Este documento explica detalladamente cómo navegar por la web y explorar todas sus funcionalidades.</p>

        <hr>

        <h2>1. Introducción</h2>
        <p>La página web ha sido diseñada para ser el punto de encuentro digital de la familia Atlante. Permite a los usuarios consultar horarios, próximas competiciones, leer crónicas en el blog, ver fotos en la galería y, lo más importante, unirse al equipo rellenando un sencillo formulario.</p>

        <hr>

        <h2>2. Componentes Comunes (Cabecera y Menú)</h2>
        <p>En la parte superior de todas las páginas encontrarás la barra de navegación.</p>

        <h3>Modo Oscuro y Modo Claro</h3>
        <p>A la derecha de la barra de navegación verás un icono de un <strong>Sol</strong> o una <strong>Luna</strong>.</p>
        <ul>
            <li>Si haces clic en él, la página cambiará entre el <strong>modo claro</strong> y el <strong>modo oscuro</strong>.</li>
            <li>Tu preferencia se guarda automáticamente (usando el almacenamiento de tu navegador), por lo que la próxima vez que visites la web recordará cómo lo dejaste.</li>
        </ul>

        <h3>Enlaces de Navegación</h3>
        <ul>
            <li><strong>El Club</strong>: Te dirige automáticamente a la sección de valores e información (en la web principal).</li>
            <li><strong>Blog</strong>: Te lleva al apartado de noticias y crónicas de partidos.</li>
            <li><strong>Galería</strong>: Te lleva a la sección donde puedes ver las mejores fotos del equipo en acción.</li>
            <li><strong>Horarios</strong>: Desplaza la vista directamente a la tabla con los horarios y días de entrenamiento.</li>
            <li><strong>¡Apúntate!</strong>: Un botón destacado que te lleva al formulario de inscripción al final de la portada.</li>
            <li><strong>Menú Móvil</strong>: Si entras desde el teléfono, verás un icono de tres rayas (hamburguesa) en lugar de los textos. Al pulsarlo, se desplegará el menú.</li>
        </ul>

        <hr>

        <h2>3. Página Principal (Inicio)</h2>

        <h3>Panel Superior (Hero) y Marcador</h3>
        <ul>
            <li>Verás el lema del club <em>"Sangre, sudor y respeto"</em> y un botón rápido para ir al formulario de contacto.</li>
            <li>Justo debajo, hay un <strong>marcador dinámico</strong> que anuncia el <strong>próximo encuentro</strong> (fecha, hora, lugar y equipos).</li>
            <li>Si hay más encuentros programados en el calendario, verás una lista con "Otros encuentros programados". Si la temporada ha terminado, el marcador indicará que se está preparando el siguiente reto.</li>
        </ul>

        <h3>Secciones "Valores" y "Nuestra Piel"</h3>
        <ul>
            <li>Aquí podrás leer sobre la filosofía del club (Respeto, Sitio para todos y Tercer Tiempo).</li>
            <li>Además, hay un apartado de "Nuestra piel" con imágenes representativas y un cuadro destacado explicando el esfuerzo del club por desarrollar el <strong>Rugby Femenino</strong>.</li>
        </ul>

        <h3>Horarios de Entrenamiento</h3>
        <ul>
            <li>Encontrarás información clasificada por días (por ejemplo, Lunes y Miércoles).</li>
            <li>Cada tarjeta te mostrará la hora, el polideportivo y el número de campo (F4, F5, etc.) para todas las categorías (senior masculino, femenino y escuela).</li>
        </ul>

        <h3>El Club en los Medios</h3>
        <ul>
            <li>Contiene tarjetas con enlaces a vídeos (en YouTube o medios de prensa local) donde el club ha aparecido promocionando su labor o torneos solidarios. Puedes hacer clic en los botones para ver los reportajes.</li>
        </ul>

        <hr>

        <h2>4. Formulario de Inscripción ("Únete al equipo")</h2>
        <p>Al final de la página principal está el formulario para los nuevos soldados que quieran unirse a la melé.</p>
        <p><strong>Pasos para unirse:</strong></p>
        <ol>
            <li>Rellena tu <strong>Nombre y apellidos</strong>.</li>
            <li>Escribe tu <strong>Teléfono (WhatsApp)</strong> para que el Míster pueda hablarte.</li>
            <li>Proporciona tu <strong>Edad</strong>.</li>
            <li>Selecciona en el desplegable el <strong>equipo en el que estás interesado</strong> (Masculino, Femenino, Inferiores o "No lo sé / Quiero probar").</li>
            <li>Si ya has jugado al rugby, marca la casilla "Ya he jugado al rugby antes".</li>
            <li>Añade algún comentario adicional en el cuadro de texto.</li>
            <li>Pulsa "Enviar Solicitud".</li>
        </ol>
        <p>Si todo va bien, verás un mensaje de éxito con un check verde afirmando que tus datos se han enviado.</p>

        <hr>

        <h2>5. El Blog y Galería</h2>
        <ul>
            <li><strong>Blog (<code>/blog</code>)</strong>: Es el portal de "La Crónica del Club". Podrás leer diferentes artículos con un diseño muy visual que alterna la posición de las imágenes y textos. Verás la imagen representativa, fecha, título y contenido. Si aún no hay crónicas, aparecerá un aviso de "Aún no hay noticias".</li>
            <li><strong>Galería (<code>/galeria</code>)</strong>: Aquí se agrupan fotografías del club, eventos y miembros del equipo para transmitir el ADN Atlante visualmente.</li>
        </ul>

        <hr>

        <h2>6. Pie de Página (Footer) y Aspectos Legales</h2>
        <p>En la parte inferior verás la información de contacto y enlaces críticos:</p>
        <ul>
            <li><strong>Dónde Estamos</strong>: Dirección de las instalaciones y enlaces directos a las redes sociales del club (Facebook, Instagram y YouTube).</li>
            <li><strong>Contacto y Legal</strong>: Teléfono de contacto junto con enlaces a las páginas legales:
                <ul>
                    <li>Política de Privacidad</li>
                    <li>Aviso Legal</li>
                    <li>Política de Cookies</li>
                    <li>Enlace al documento técnico del proyecto (Documentación).</li>
                </ul>
            </li>
            <li><strong>Aviso de Cookies</strong>: La primera vez que entres, un pequeño banner en la zona inferior te avisará del uso de cookies. Haciendo clic en "Aceptar", desaparecerá y no volverá a molestar en futuras visitas.</li>
        </ul>

        <hr>

        <p style="text-align: center; font-style: italic; color: var(--texto-secundario);">Diseñado y desarrollado para potenciar y dar a conocer el rugby en la provincia de Jaén.</p>
    </div>

    <script>
        // Lógica del modo oscuro para que ione aquí
        const btnTema = document.getElementById('btn-tema'); const iconoTema = document.getElementById('icono-tema'); const cuerpoWeb = document.body;
        if (localStorage.getItem('temaElegido') === 'claro') { cuerpoWeb.classList.add('modo-claro'); iconoTema.classList.replace('fa-sun', 'fa-moon'); }
        btnTema.addEventListener('click', () => {
            cuerpoWeb.classList.toggle('modo-claro');
            if (cuerpoWeb.classList.contains('modo-claro')) { localStorage.setItem('temaElegido', 'claro'); iconoTema.classList.replace('fa-sun', 'fa-moon'); } 
            else { localStorage.setItem('temaElegido','oscuro'); iconoTema.classList.replace('fa-moon', 'fa-sun'); }
        });
    </script>
</body>

</html>