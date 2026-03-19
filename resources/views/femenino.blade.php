@extends('layouts.app')

@section('title', 'Cariátides - Equipo Femenino | Úbeda Atlantes Rugby')

@section('seo')
    <meta name="description" content="Únete a las Cariátides, el equipo de rugby femenino del Úbeda Atlantes. Buscamos jugadoras con o sin experiencia en Úbeda y la comarca de La Loma.">
    <meta name="keywords" content="rugby femenino Úbeda, equipo femenino Jaén, deporte femenino Úbeda, Cariátides rugby, jugar rugby femenino">
    <meta name="author" content="Club de Rugby Úbeda Atlantes">
    <meta name="robots" content="index, follow">

    <meta property="og:title" content="Cariátides - Equipo Femenino | Úbeda Atlantes">
    <meta property="og:description" content="Si ellos sostienen el mundo, nosotras sostenemos el templo. Únete al corazón del rugby femenino en La Loma.">
    <meta property="og:image" content="{{ asset('images/fondo-femenino-desktop.jpg') }}">
    <meta property="og:url" content="{{ url('femenino') }}">
    <meta property="og:type" content="article">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Cariátides - Equipo Femenino | Úbeda Atlantes">
    <meta name="twitter:description" content="Si ellos sostienen el mundo, nosotras sostenemos el templo. Únete al corazón del rugby femenino en La Loma.">
    <meta name="twitter:image" content="{{ asset('images/fondo-femenino-desktop.jpg') }}">

    <link rel="canonical" href="{{ url('femenino') }}">
@endsection

@section('styles')
<style>
    /* Configuración adaptativa para el apartado Femenino */
    @media (max-width: 768px) {
        /* En móviles, cargamos la foto vertical recortada y bien encuadrada */
        .hero {
            background-image: url('{{ asset('images/fondo-femenino-movil.jpg') }}') !important;
            background-position: center bottom !important; /* Enfocamos en las jugadoras de abajo */
            background-size: cover !important;
            background-attachment: scroll !important; /* Desactivamos parallax en móvil */
        }
    }
</style>
@endsection

@section('content')
    <section class="hero" style="--bg-img: url('{{ asset('images/fondo-femenino-desktop.jpg') }}'); min-height: 50vh;">
        </section>

    <section style="max-width: 1000px; margin: 60px auto; padding: 0 20px; line-height: 1.8; font-size: 1.1rem; color: var(--texto-principal);">
        
        <div style="max-width: 800px; margin: 0 auto;">
            <h2 style="color: var(--rojo-pasion); margin-bottom: 20px; font-family: 'Oswald', sans-serif;">SI ELLOS SOSTIENEN EL MUNDO, NOSOTRAS SOSTENEMOS EL TEMPLO</h2>
            <p>Al igual que los Atlantes soportan el peso en las fachadas de los palacios de Úbeda, las <strong>Cariátides</strong> son las columnas femeninas que mantienen en pie la historia y el espíritu de los templos antiguos. No podíamos tener un nombre mejor para nuestro equipo senior femenino.</p>
            
            <p>El rugby no entiende de géneros, entiende de actitud. Las Cariátides somos más que un equipo: somos una familia que se apoya dentro y fuera del campo. Da igual si eres alta o baja, rápida o fuerte, o si nunca has tocado un balón ovalado. En nuestra melé hay un sitio exacto para tu complexión y tu carácter.</p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; margin: 40px 0;">
            <div style="text-align: center;">
                <img src="{{ asset('images/cariatides_1.jpg') }}" alt="Equipo Femenino Atlantes - Cariátides" style="width: 100%; height: 350px; object-fit: cover; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.3); border: 2px solid var(--rojo-pasion);">
            </div>
            <div style="text-align: center;">
                <img src="{{ asset('images/cariatides_2.jpg') }}" alt="Acción de juego equipo femenino" style="width: 100%; height: 350px; object-fit: cover; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.3); border: 2px solid var(--rojo-pasion);">
            </div>
            <div style="text-align: center;">
                <img src="{{ asset('images/cariatides_3.jpg') }}" alt="Celebración equipo femenino" style="width: 100%; height: 350px; object-fit: cover; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.3); border: 2px solid var(--rojo-pasion);">
            </div>
        </div>

        <div style="max-width: 800px; margin: 0 auto;">
            <div style="background: var(--bg-secundario); padding: 30px; border-radius: 8px; margin: 40px 0; border-left: 4px solid var(--rojo-pasion);">
                <h3 style="margin-top: 0; margin-bottom: 15px; color: var(--texto-principal); font-family: 'Oswald', sans-serif;"><i class="fa-solid fa-calendar-check"></i> VEN A PROBAR SIN COMPROMISO</h3>
                <p style="margin-bottom: 10px;"><strong>Lugar:</strong> Polideportivo Municipal Antonio Cruz Sánchez (Úbeda)</p>
                <p style="margin-bottom: 0;"><strong>Material necesario:</strong> Ropa deportiva cómoda y unas zapatillas. Nosotras ponemos el balón, la paciencia para enseñarte desde cero y el Tercer Tiempo.</p>
            </div>

            <p>Estamos construyendo algo grande en la provincia de Jaén y queremos que formes parte de ello. Solo necesitas venir a probar un día para entender por qué este deporte engancha para toda la vida.</p>

            <div style="text-align: center; margin-top: 60px; margin-bottom: 40px;">
                <a href="{{ route('contacto') }}" class="btn-principal" style="font-size: 1.2rem; padding: 15px 30px; display: inline-block; position: relative; overflow: hidden; border-radius: 50px;">QUIERO SER CARIÁTIDE <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
    </section>
@endsection