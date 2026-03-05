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
        
        <h1>POLÍTICA DE PRIVACIDAD</h1>
        
        <h2>1. Responsable del Tratamiento</h2>
        <p>El responsable del tratamiento de los datos recabados en este sitio web es el <strong>Club de Rugby Úbeda Atlantes</strong>, con correo electrónico de contacto: info@rugbyubedaatlantes.es.</p>

        <h2>2. Finalidad de los datos</h2>
        <p>Los datos personales recogidos a través del formulario de "Únete al Equipo" (nombre, teléfono, edad y experiencia) serán utilizados exclusivamente con la finalidad de gestionar la captación de nuevos jugadores y ponernos en contacto con usted vía WhatsApp o llamada telefónica.</p>

        <h2>3. Conservación y Derechos</h2>
        <p>Los datos se conservarán mientras exista un interés mutuo. Usted tiene derecho a acceder, rectificar, limitar y suprimir sus datos en cualquier momento enviando un correo a nuestra dirección de contacto.</p>

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