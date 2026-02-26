<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Úbeda Atlantes</title>
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
            <a href="{{ route('blog') }}" style="color: var(--rojo-pasion);">Blog</a>
            <a href="{{ route('galeria') }}">Galería</a>
            <a href="{{ url('/') }}#horarios">Horarios</a>
            <a href="{{ url('/') }}#contacto" class="btn-nav">¡Apúntate!</a>
        </div>
        <div class="social-icons">
            <button id="btn-tema" class="btn-tema" title="Cambiar modo"><i class="fa-solid fa-sun" id="icono-tema"></i></button>
        </div>
    </nav>

    <header class="blog-header">
        <h1><i class="fa-solid fa-newspaper" style="color: var(--rojo-pasion);"></i> LA CRÓNICA DEL CLUB</h1>
        <p>Noticias, resultados y el día a día del Úbeda Atlantes.</p>
    </header>

    <main class="blog-grid">
        @forelse($posts as $post)
            <article class="post-card">
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="post-img">
                <div class="post-content">
                    <span class="post-date"><i class="fa-regular fa-calendar"></i> {{ $post->created_at->format('d/m/Y') }}</span>
                    <h2 class="post-title">{{ $post->title }}</h2>
                    <p class="post-text">{{ $post->content }}</p>
                </div>
            </article>
        @empty
            <div class="blog-empty">
                <h2><i class="fa-regular fa-folder-open" style="font-size: 3rem; margin-bottom: 20px;"></i></h2>
                <h2>AÚN NO HAY NOTICIAS</h2>
                <p>El Míster todavía no ha publicado ninguna crónica de partido.</p>
            </div>
        @endforelse
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