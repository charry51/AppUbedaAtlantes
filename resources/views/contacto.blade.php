@extends('layouts.app')

@section('title', '¡Apúntate! | Úbeda Atlantes Rugby')

@section('seo')
    <meta name="description" content="Únete al Úbeda Atlantes Rugby Club. Rellena el formulario y ven a probar sin compromiso. Equipos masculino, femenino y categorías inferiores.">
    <meta name="keywords" content="apuntarse rugby Úbeda, contacto Atlantes rugby, jugar rugby Jaén, entrenamientos rugby">
    <meta name="author" content="Club de Rugby Úbeda Atlantes">
    <meta name="robots" content="index, follow">

    <meta property="og:title" content="¡Apúntate al Equipo! | Úbeda Atlantes">
    <meta property="og:description" content="El primer paso es el más difícil. El resto lo hacemos en equipo. Ven a probar el rugby en Úbeda sin compromiso.">
    <meta property="og:image" content="{{ asset('images/principal.jpg') }}">
    <meta property="og:url" content="{{ route('contacto') }}">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="¡Apúntate al Equipo! | Úbeda Atlantes">
    <meta name="twitter:description" content="Ven a probar el rugby en Úbeda sin compromiso. No necesitas experiencia.">
    <meta name="twitter:image" content="{{ asset('images/principal.jpg') }}">

    <link rel="canonical" href="{{ route('contacto') }}">
@endsection

@section('content')
    <section class="hero" style="--bg-img: url('{{ asset('images/principal.jpg') }}'); min-height: 40vh;">
        <h1 style="text-transform: uppercase; font-size: 3rem;">SALTAR AL CAMPO</h1>
        <p>El primer paso es el más difícil. El resto lo hacemos en equipo.</p>
    </section>

    <section class="reclutamiento-section" style="padding-top: 60px; padding-bottom: 80px; position: relative;">
        <img src="{{ asset('images/logo.png') }}" alt="Escudo de fondo" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); opacity: 0.03; width: 60%; max-width: 500px; z-index: 1; pointer-events: none;">

        <div style="max-width: 600px; margin: 0 auto; background: var(--bg-secundario); padding: 40px; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.5); position: relative; z-index: 2;">
            <h2 style="text-align: center; margin-bottom: 10px; color: var(--rojo-pasion); font-family: 'Oswald', sans-serif; font-size: 2rem;">ÚNETE AL EQUIPO</h2>
            <p style="text-align: center; margin-bottom: 30px; color: var(--texto-secundario);">Déjanos tus datos y el Míster te escribirá por WhatsApp para darte todos los detalles de los entrenamientos.</p>

            @if(session('success'))
            <div style="background: #27ae60; color: white; padding: 15px; border-radius: 5px; margin-bottom: 20px; text-align: center; font-weight: bold;">
                <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
            </div>
            @endif

            <form action="{{ route('contacto.store') }}" method="POST">
                @csrf
                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: bold; font-size: 0.9rem; color: var(--texto-principal);">NOMBRE Y APELLIDOS</label>
                    <input type="text" name="name" value="{{ old('name') }}" required placeholder="Tu nombre completo" style="width: 100%; padding: 12px; border-radius: 6px; border: 1px solid var(--borde-color); background: #fff; color: #333; font-family: inherit;">
                    @error('name') <span style="color: #e74c3c; font-size: 0.85rem; display: block; margin-top: 5px;">{{ $message }}</span> @enderror
                </div>
                
                <div style="display: flex; gap: 15px; margin-bottom: 20px; flex-wrap: wrap;">
                    <div style="flex: 2; min-width: 200px;">
                        <label style="display: block; margin-bottom: 8px; font-weight: bold; font-size: 0.9rem; color: var(--texto-principal);">TELÉFONO (WHATSAPP)</label>
                        <input type="tel" name="phone" value="{{ old('phone') }}" required placeholder="600 000 000" style="width: 100%; padding: 12px; border-radius: 6px; border: 1px solid var(--borde-color); background: #fff; color: #333; font-family: inherit;">
                        @error('phone') <span style="color: #e74c3c; font-size: 0.85rem; display: block; margin-top: 5px;">{{ $message }}</span> @enderror
                    </div>
                    <div style="flex: 1; min-width: 100px;">
                        <label style="display: block; margin-bottom: 8px; font-weight: bold; font-size: 0.9rem; color: var(--texto-principal);">EDAD</label>
                        <input type="number" name="age" value="{{ old('age') }}" placeholder="Ej: 22" min="5" max="99" style="width: 100%; padding: 12px; border-radius: 6px; border: 1px solid var(--borde-color); background: #fff; color: #333; font-family: inherit;">
                        @error('age') <span style="color: #e74c3c; font-size: 0.85rem; display: block; margin-top: 5px;">{{ $message }}</span> @enderror
                    </div>
                </div>
                
                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: bold; font-size: 0.9rem; color: var(--texto-principal);">¿EN QUÉ EQUIPO ESTÁS INTERESADO/A?</label>
                    <select name="team_interest" style="width: 100%; padding: 12px; background: #fff; border: 1px solid var(--borde-color); color: #333; border-radius: 6px; font-family: inherit; cursor: pointer;">
                        <option value="Senior Femenino" {{ old('team_interest') == 'Senior Femenino' ? 'selected' : '' }}>Senior Femenino (Cariátides)</option>
                        <option value="Senior Masculino" {{ old('team_interest') == 'Senior Masculino' ? 'selected' : '' }}>Senior Masculino (Atlantes)</option>
                        <option value="Categorías Inferiores" {{ old('team_interest') == 'Categorías Inferiores' ? 'selected' : '' }}>Categorías Inferiores (Escuela)</option>
                        <option value="No lo sé / Otro" {{ old('team_interest', 'No lo sé / Otro') == 'No lo sé / Otro' ? 'selected' : '' }}>No lo sé / Quiero probar</option>
                    </select>
                    @error('team_interest') <span style="color: #e74c3c; font-size: 0.85rem; display: block; margin-top: 5px;">{{ $message }}</span> @enderror
                </div>
                
                <div style="margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
                    <input type="checkbox" name="has_experience" id="exp" {{ old('has_experience') ? 'checked' : '' }} style="width: 18px; height: 18px; cursor: pointer;">
                    <label for="exp" style="cursor: pointer; color: var(--texto-principal);">Ya he jugado al rugby antes</label>
                </div>
                
                <div style="margin-bottom: 30px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: bold; font-size: 0.9rem; color: var(--texto-principal);">¿ALGO QUE DEBAMOS SABER?</label>
                    <textarea name="message" rows="3" placeholder="Ej: Nunca he jugado pero hago pesas, o tengo disponibilidad solo los jueves..." style="width: 100%; padding: 12px; border-radius: 6px; border: 1px solid var(--borde-color); background: #fff; color: #333; font-family: inherit; resize: vertical;">{{ old('message') }}</textarea>
                </div>
                
                <button type="submit" class="btn-principal" style="width: 100%; padding: 15px; font-size: 1.2rem; border: none; cursor: pointer; display: inline-block; position: relative; overflow: hidden; border-radius: 50px;">
                    ENVIAR SOLICITUD <i class="fa-solid fa-paper-plane" style="margin-left: 8px;"></i>
                </button>
            </form>
        </div>
    </section>
@endsection