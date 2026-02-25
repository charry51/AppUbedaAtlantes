<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentación - Úbeda Atlantes</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&family=Oswald:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .doc-container { max-width: 800px; margin: 120px auto 50px auto; padding: 40px; background-color: var(--bg-secundario); border-radius: 8px; border: 1px solid var(--borde-color); }
        .doc-container h1 { color: var(--rojo-pasion); font-size: 2.5rem; text-align: center; margin-bottom: 10px; }
        .doc-container h2 { color: var(--texto-principal); font-size: 1.8rem; margin-top: 40px; border-bottom: 2px solid var(--rojo-pasion); padding-bottom: 10px; }
        .doc-container h3 { color: var(--texto-principal); margin-top: 30px; }
        .doc-container p, .doc-container li { line-height: 1.8; color: var(--texto-secundario); margin-bottom: 15px; }
        .doc-container ul, .doc-container ol { margin-bottom: 20px; padding-left: 20px; }
        .btn-volver { display: inline-block; margin-bottom: 20px; color: var(--rojo-pasion); text-decoration: none; font-weight: bold; }
        .btn-volver:hover { text-decoration: underline; }
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="{{ url('/') }}"><img src="{{ asset('images/logo.png') }}" alt="Escudo Atlantes" class="nav-logo"></a>
        <div class="social-icons">
            <button id="btn-tema" class="btn-tema" title="Cambiar modo claro/oscuro"><i class="fa-solid fa-sun" id="icono-tema"></i></button>
        </div>
    </nav>

    <div class="doc-container">
        <a href="{{ url('/') }}" class="btn-volver"><i class="fa-solid fa-arrow-left"></i> Volver a la web</a>
        
        <h1>DOCUMENTACIÓN DEL PROYECTO</h1>
        <p style="text-align: center; font-weight: bold; color: var(--texto-principal);">Plataforma de Captación y Gestión - Club de Rugby Úbeda Atlantes</p>
        
        <h2>2. ¿Qué es?</h2>
        <p>La aplicación web desarrollada es el portal principal (Front-end) y el inicio del sistema de gestión (Back-end) para el <strong>Club de Rugby Úbeda Atlantes</strong>. Ha sido desarrollada utilizando el framework Laravel (PHP) bajo el patrón MVC, conectada a una base de datos MySQL.</p>
        <p>El proyecto nace para resolver dos necesidades: <strong>Informativa e Identidad</strong> (ofrecer una imagen profesional y horarios) y <strong>Captación</strong> (automatizar la entrada de nuevos jugadores mediante un formulario conectado a la base de datos).</p>

        <h2>3. Pantalla Principal Explicada</h2>
        <ul>
            <li><strong>Sección Hero (Cabecera):</strong> Diseñada para impactar visualmente. Utiliza una fotografía a pantalla completa y un botón de llamada a la acción.</li>
            <li><strong>Marcador Dinámico:</strong> Se conecta al modelo `Game`. Evalúa si existe un partido futuro y renderiza los escudos, fecha y estadio dinámicamente.</li>
            <li><strong>Horarios y Valores:</strong> Bloques informativos que desglosan los días de entrenamiento en el Polideportivo Municipal y los valores del club.</li>
            <li><strong>Formulario de Reclutamiento:</strong> Recopila datos de interesados, protegido con token `@csrf` y conectado a la tabla `contacts`.</li>
        </ul>

        <h2>4. Tareas Más Importantes Explicadas</h2>
        <h3>A. Enviar Solicitud de Reclutamiento</h3>
        <ol>
            <li>El usuario rellena los campos (Nombre, WhatsApp...) y pulsa enviar.</li>
            <li>Los datos viajan por el método POST hacia la ruta `/contacto`.</li>
            <li>El `ContactController` valida los datos y crea un registro en la tabla `contacts` de MySQL.</li>
        </ol>

        <h3>B. Cambio de Tema (Modo Claro/Oscuro)</h3>
        <ol>
            <li>El usuario hace clic en el botón del Sol/Luna.</li>
            <li>JavaScript inyecta la clase `.modo-claro` al body, alterando las variables CSS de color.</li>
            <li>Se guarda la preferencia en `localStorage` para que el navegador la recuerde en futuras visitas.</li>
        </ol>
    </div>

    <script>
        // Lógica del modo oscuro para que también funcione aquí
        const btnTema = document.getElementById('btn-tema'); const iconoTema = document.getElementById('icono-tema'); const cuerpoWeb = document.body;
        if (localStorage.getItem('temaElegido') === 'claro') { cuerpoWeb.classList.add('modo-claro'); iconoTema.classList.replace('fa-sun', 'fa-moon'); }
        btnTema.addEventListener('click', () => {
            cuerpoWeb.classList.toggle('modo-claro');
            if (cuerpoWeb.classList.contains('modo-claro')) { localStorage.setItem('temaElegido', 'claro'); iconoTema.classList.replace('fa-sun', 'fa-moon'); } 
            else { localStorage.setItem('temaElegido', 'oscuro'); iconoTema.classList.replace('fa-moon', 'fa-sun'); }
        });
    </script>
</body>
</html>