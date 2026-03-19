@extends('layouts.app')

@section('title', 'Historia del Rugby en Úbeda | Club Atlantes')

@section('seo')
    <meta name="description" content="Conoce la historia del Club de Rugby Úbeda Atlantes, nacido en Úbeda (Jaén) cuando un grupo de apasionados pegó carteles por la ciudad y aparecieron 40 personas.">
    <meta name="keywords" content="rugby en Úbeda, club de rugby Úbeda, rugby Jaén, rugby La Loma, historia rugby andalucia">
    <meta name="author" content="Club de Rugby Úbeda Atlantes">
    <meta name="robots" content="index, follow">

    <meta property="og:title" content="Historia del Rugby en Úbeda | Club Atlantes">
    <meta property="og:description" content="La historia del rugby que nació de una ciudad de piedra y personas de hierro. Descubre nuestros orígenes.">
    <meta property="og:image" content="{{ asset('images/fondo-historia.jpg') }}">
    <meta property="og:url" content="{{ url('historia') }}">
    <meta property="og:type" content="article">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Historia del Rugby en Úbeda | Club Atlantes">
    <meta name="twitter:description" content="La historia del rugby que nació de una ciudad de piedra y personas de hierro.">
    <meta name="twitter:image" content="{{ asset('images/fondo-historia.jpg') }}">

    <link rel="canonical" href="{{ url('historia') }}">
@endsection

@section('styles')
<style>
    /* Forzamos que en móvil se vea la foto vertical y BIEN encuadrada */
    @media (max-width: 768px) {
        .hero {
            background-image: url('{{ asset('images/fondo-historia-movil.jpg') }}') !important;
            background-position: center bottom !important; /* Obliga a mostrar la parte de abajo (jugadores) */
            background-size: cover !important; /* Asegura que llene el espacio */
            background-attachment: scroll !important; /* Desactiva el parallax en móvil por si da fallos */
        }
    }
</style>
@endsection

@section('content')
    <section class="hero" style="--bg-img: url('{{ asset('images/fondo-historia.jpg') }}'); min-height: 50vh;">
        <h1 style="text-transform: uppercase; font-size: 3rem;">Nuestra Historia</h1>
        <p>La historia del rugby que nació de una ciudad de piedra y personas de hierro.</p>
    </section>

    <section style="max-width: 800px; margin: 60px auto; padding: 0 20px; line-height: 1.8; font-size: 1.1rem; color: var(--texto-principal);">
        
            <p>Hay ciudades que pesan. No por su tamaño, sino por lo que guardan entre sus muros. Úbeda, declarada Patrimonio de la Humanidad por la UNESCO, lleva siglos sostenida por sus palacios renacentistas, sus plazas de piedra dorada y el trabajo silencioso de quienes la habitan. En sus fachadas más nobles, unas figuras esculpidas en piedra —los atlantes— cumplen desde hace cinco siglos la misma tarea: sostener el peso del edificio sobre sus hombros, sin doblar las rodillas, sin pedir nada a cambio.</p>
            
            <p>No podíamos haber elegido mejor nombre.</p>

            <h2 style="color: var(--rojo-pasion); margin-top: 40px; margin-bottom: 20px; font-family: 'Oswald', sans-serif;">De dos carteles pegados en una pared a cuarenta personas en un campo</h2>
            <p>Todo comenzó con una idea sencilla y una ciudad entera como lienzo.</p>
            <p>A principios de la década de 2010, un pequeño grupo de personas —menos de diez, pero con la energía de cien— tenían en común dos cosas: el amor por el rugby y la certeza de que Úbeda se merecía este deporte. Algunos habían jugado antes. Otros simplemente lo habían sentido. Todos compartían la misma convicción: había que intentarlo.</p>
            <p>No había estadio. No había presupuesto. No había garantías.</p>
            <p>Lo que había eran carteles.</p>
            <p>Los pegaron en bares, comercios, farmacias y escaparates de toda la ciudad. Un mensaje directo, sin florituras: si te gusta el rugby o tienes curiosidad, ven a entrenar. Sin requisitos. Sin experiencia necesaria. Solo ganas.</p>
            <p>El primer día de entrenamiento llegaron cuarenta personas.</p>
            <p>Cuarenta. En una ciudad donde el rugby era prácticamente desconocido. Cuarenta personas que respondieron a un cartel pegado en una pared porque algo en ellas reconoció que aquello era diferente. Que aquello era suyo. Ese día nació el Club de Rugby Úbeda Atlantes.</p>

        <div style="margin: 40px 0; text-align: center;">
            <img src="{{ asset('images/historia_1.jpg') }}" alt="Primer equipo del Club de Rugby Úbeda Atlantes" style="width: 100%; max-width: 800px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.3); border: 3px solid var(--rojo-pasion);">
            <p style="font-style: italic; font-size: 0.9rem; color: #888; margin-top: 10px;">Una de las primeras fotografías del equipo en sus inicios.</p>
        </div>

            <h2 style="color: var(--rojo-pasion); margin-top: 40px; margin-bottom: 20px; font-family: 'Oswald', sans-serif;">El nombre que lo explica todo</h2>
            <p>Cuando llegó el momento de elegir nombre, la respuesta estaba escrita literalmente en las paredes de la ciudad.</p>
            <p>Los atlantes son las figuras esculpidas en los palacios renacentistas de Úbeda —el Palacio de las Cadenas, la Sacra Capilla del Salvador, las joyas de piedra que hacen de esta ciudad un lugar único en el mundo— que sostienen cornisas y columnas sobre sus hombros. Figuras que no se rinden. Que aguantan. Que están ahí cuando el edificio necesita apoyo.</p>
            <p>¿Qué es un jugador de rugby, si no exactamente eso?</p>
            <p>Alguien que sostiene al compañero cuando cae. Que empuja en la melé cuando los músculos ya no dan más. Que se levanta del barro, escupe y vuelve a entrar. El rugby en Úbeda y los atlantes de sus palacios son la misma cosa: la negativa a doblar las rodillas ante el peso del mundo. El nombre no fue un capricho. Fue un pacto con la historia de nuestra ciudad.</p>

            <h2 style="color: var(--rojo-pasion); margin-top: 40px; margin-bottom: 20px; font-family: 'Oswald', sans-serif;">Crecer, sudar y abrir la puerta a todos</h2>
            <p>Durante años, el Atlantes creció partido a partido, entrenamiento a entrenamiento, tercero a tercero. El club se fue forjando con victorias, con derrotas, con lesiones y con ese vínculo que solo se construye cuando llevas años compartiendo barro y sudor con las mismas personas.</p>
            <p>Pero hubo un momento en que el club tomó una decisión que lo cambió todo: abrir la puerta a las mujeres.</p>
            <p>La creación del equipo senior femenino no fue una concesión ni una moda. Fue el reconocimiento de algo que el rugby siempre ha sabido y que la sociedad tarda en aprender: que este deporte no tiene género, tiene carácter. Hoy, el equipo femenino del Atlantes es uno de los proyectos más vivos y ambiciosos del club, un espacio donde cada semana más mujeres descubren que el rugby estaba esperándolas.</p>
            <p>Y el compromiso con Úbeda no se quedó dentro del campo.</p>
            <p>Durante más de una década, el club ha organizado el Torneo Solidario de Rugby Ciudad de Úbeda, un evento que ha alcanzado ya su décima edición y que cada año convoca a equipos de toda la provincia y de más allá. Un torneo que se paga con alimentos no perecederos. Que llena las gradas de familias. Que convierte el rugby en una herramienta de comunidad real, en el corazón de una ciudad que lleva siglos siendo referente de cultura y de identidad en Andalucía. Diez ediciones. Diez veces que Úbeda ha demostrado que el deporte puede ser generoso.</p>

            <h2 style="color: var(--rojo-pasion); margin-top: 40px; margin-bottom: 20px; font-family: 'Oswald', sans-serif;">Un refugio para quien no encajaba en ningún otro sitio</h2>
            <p>Si hay algo que define al Atlantes más allá de los resultados y los torneos, es esto: aquí hay sitio para todos. Siempre lo ha habido.</p>
            <p>Desde el principio, el club se convirtió en algo más que un equipo de rugby en Úbeda. Se convirtió en un lugar al que llegaba la gente que no terminaba de encajar en el fútbol ni en el baloncesto, en los deportes de siempre donde parece que ya está todo repartido. Gente que buscaba algo diferente. Gente que necesitaba una tribu. Y la encontraron.</p>
            <p>Hay personas en este club que entraron con dieciséis años viendo un cartel pegado en un escaparate, sin haber tocado nunca un balón oval, y que décadas después siguen ahí. No por obligación. Sino porque el Atlantes les dio algo que ningún otro deporte les había dado: la sensación de que pertenecían a algo.</p>
            <p>En el rugby no importa si eres alto o bajo, rápido o fuerte, si eres nuevo en la ciudad o llevas toda la vida aquí. Hay una posición para tu cuerpo y un hueco para tu carácter. Lo único que pedimos es que entres al campo con ganas y que, cuando suene el pitido final, le estreches la mano al rival con la misma honestidad con la que jugaste.</p>

            <h2 style="color: var(--rojo-pasion); margin-top: 40px; margin-bottom: 20px; font-family: 'Oswald', sans-serif;">Hoy: rugby en Jaén con historia, futuro y puertas abiertas</h2>
            <p>Más de una década después de aquellos primeros carteles pegados en las paredes de Úbeda, el club compite en la Liga Andaluza de Rugby, organiza torneos que trascienden la comarca de La Loma, y trabaja cada día para ser el referente del rugby en la provincia de Jaén.</p>
            <p>El camino no siempre fue fácil. Hubo temporadas de plantilla corta, de sumar kilómetros en coches prestados, de entrenar bajo la lluvia cuando el campo estaba en otro estado. Pero nadie se fue. Porque en el Atlantes, la razón para quedarse nunca fue ganar. Fue el de al lado.</p>

        <div style="margin: 40px 0; text-align: center;">
            <img src="{{ asset('images/historia_2.jpg') }}" alt="Jugadores del Atlantes en el campo" style="width: 100%; max-width: 800px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.3); border: 3px solid var(--rojo-pasion);">
        </div>
            <p>Si estás leyendo esto desde Úbeda, desde Baeza, desde Linares o desde cualquier rincón de Jaén, y algo dentro de ti está sintiendo que esto puede ser tuyo, escúchalo.</p>
            <p>Los atlantes de piedra de nuestros palacios llevan cinco siglos aguantando.</p>
            <p>Nosotros llevamos más de una década haciéndolo. Y no vamos a parar. ¿Quieres ser parte de esta historia? Entrena con nosotros. No necesitas experiencia. Solo ganas.</p>

            <div style="text-align: center; margin-top: 60px; margin-bottom: 40px;">
                <a href="{{ route('contacto') }}" class="btn-principal" style="font-size: 1.2rem; padding: 15px 30px; display: inline-block; position: relative; overflow: hidden; border-radius: 50px;">QUIERO UNIRME AL ATLANTES <i class="fa-solid fa-arrow-right"></i></a>
            </div>
    </section>
@endsection