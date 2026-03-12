@extends('layouts.app')

@section('title', 'Blog - Úbeda Atlantes')

@section('seo')
    <meta name="description" content="Noticias, resultados y crónicas de los partidos del Club de Rugby Úbeda Atlantes. Entérate de toda la actualidad de nuestro equipo en Jaén.">
    <meta name="keywords" content="blog rugby, noticias rugby úbeda, crónicas rugby, actualidad ubeda atlantes, liga rugby jaen, andalucia">
    <meta name="author" content="Club de Rugby Úbeda Atlantes">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="Blog y Noticias - Úbeda Atlantes">
    <meta property="og:description" content="Noticias, resultados y crónicas de los partidos del Club de Rugby Úbeda Atlantes. Entérate de toda la actualidad de nuestro equipo en Jaén.">
    <meta property="og:image" content="{{ asset('images/principal.jpg') }}">
    <meta property="og:url" content="{{ route('blog') }}">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Blog y Noticias - Úbeda Atlantes">
    <meta name="twitter:description" content="Noticias, resultados y crónicas de los partidos del Club de Rugby Úbeda Atlantes. Entérate de toda la actualidad de nuestro equipo en Jaén.">
    <meta name="twitter:image" content="{{ asset('images/principal.jpg') }}">
    <link rel="canonical" href="{{ route('blog') }}">
@endsection

{{-- Marca el enlace "Blog" en la navegación --}}
@section('nav-blog') style="color: var(--rojo-pasion);" @endsection

@section('navbar-full') @endsection

@section('content')
    <header class="blog-header">
        <h1><i class="fa-solid fa-newspaper" style="color: var(--rojo-pasion);"></i> LA CRÓNICA DEL CLUB</h1>
        <p>Noticias, resultados y el día a día del Úbeda Atlantes.</p>
    </header>

    <main class="blog-grid">
        @php
            $layouts = ['default', 'layout-reverse', 'layout-alt', 'layout-large'];
        @endphp

        @forelse($posts as $post)
        @php
            $randomLayout = $layouts[array_rand($layouts)];
        @endphp
        <article class="post-card {{ $randomLayout }}">
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

    {{-- Paginación --}}
    @if($posts->hasPages())
    <div style="text-align: center; padding: 30px;">
        {{ $posts->links() }}
    </div>
    @endif
@endsection