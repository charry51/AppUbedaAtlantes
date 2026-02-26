<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro de Mandos - Atlantes</title>
    
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Oswald:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>

    <div class="topbar">
        <div class="topbar-logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
            <h2>PANEL DEL MÍSTER</h2>
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn-logout"><i class="fa-solid fa-door-open"></i> SALIR DEL VESTUARIO</button>
        </form>
    </div>

    <div class="admin-grid">
        
        <div class="caja-admin">
            <h2><i class="fa-solid fa-users"></i> Nuevos Reclutas</h2>
            
            @if(session('success') && !session('partido_ok'))
                <div class="alerta-exito">{{ session('success') }}</div>
            @endif

            @if($contactos->count() > 0)
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Nombre</th>
                                <th>Edad</th>
                                <th>Exp.</th>
                                <th>Mensaje</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contactos as $recluta)
                            <tr>
                                <td style="color: #888;">{{ $recluta->created_at->format('d/m/Y') }}</td>
                                <td style="font-weight: bold;">{{ $recluta->name }}</td>
                                <td>{{ $recluta->age ?? '-' }}</td>
                                <td>
                                    @if($recluta->has_experience)
                                        <span style="color: #4ade80;"><i class="fa-solid fa-check"></i></span>
                                    @else
                                        <span style="color: #ff4d4d;"><i class="fa-solid fa-xmark"></i></span>
                                    @endif
                                </td>
                                <td class="col-mensaje">
                                    {{ $recluta->message }}
                                </td>
                                <td>
                                    <div class="acciones-flex">
                                        <a href="https://wa.me/34{{ str_replace(' ', '', $recluta->phone) }}" target="_blank" class="btn-whatsapp" title="Contactar">
                                            <i class="fa-brands fa-whatsapp"></i>
                                        </a>

                                        <form action="{{ route('admin.recluta.delete', $recluta->id) }}" method="POST" onsubmit="return confirm('¿Marcar como gestionado y eliminar de la lista?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-delete" title="Eliminar">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p style="color: #888; text-align: center; padding: 40px;">No hay nuevos reclutas pendientes de gestión.</p>
            @endif
        </div>

        <div class="caja-admin">
            <h2><i class="fa-solid fa-trophy"></i> Próximo Partido</h2>
            
            @if(session('success') && session('partido_ok'))
                <div class="alerta-exito">
                    <i class="fa-solid fa-circle-check"></i> Web actualizada.
                </div>
            @endif

            <form action="{{ route('admin.partido.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>EQUIPO RIVAL</label>
                    <input type="text" name="rival" required placeholder="Ej: Jaén Rugby">
                </div>

                <div class="form-group">
                    <label>FECHA Y HORA</label>
                    <input type="datetime-local" name="fecha" required>
                </div>

                <div class="form-group">
                    <label>LUGAR / ESTADIO</label>
                    <input type="text" name="lugar" required placeholder="Ej: Polideportivo San Miguel">
                </div>

                <div class="form-group">
                    <label>ESCUDO RIVAL (Opcional)</label>
                    <input type="file" name="rival_logo" accept="image/*">
                </div>

                <div class="check-group form-group">
                    <input type="checkbox" name="es_local" id="es_local" checked>
                    <label for="es_local">Jugamos en Úbeda (Local)</label>
                </div>

                <button type="submit" class="btn-submit">ACTUALIZAR WEB <i class="fa-solid fa-satellite-dish"></i></button>
            </form>
        </div>

        <div class="caja-admin">
            <h2><i class="fa-solid fa-newspaper"></i> Publicar en el Blog</h2>
            
            <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>TÍTULO DE LA NOTICIA</label>
                    <input type="text" name="title" required placeholder="Ej: Crónica del derbi contra Jaén">
                </div>

                <div class="form-group">
                    <label>IMAGEN DE PORTADA</label>
                    <input type="file" name="image" required accept="image/*">
                </div>

                <div class="form-group">
                    <label>CONTENIDO</label>
                    <textarea name="content" rows="6" required placeholder="Escribe aquí la noticia..." style="width: 100%; padding: 12px; background: var(--bg-principal); border: 1px solid var(--borde-color); color: white; border-radius: 4px; font-family: inherit; resize: vertical;"></textarea>
                </div>

                <button type="submit" class="btn-submit">PUBLICAR NOTICIA <i class="fa-solid fa-paper-plane"></i></button>
            </form>
        </div>

        <div class="caja-admin">
            <h2><i class="fa-solid fa-camera-retro"></i> Subir Fotos a Galería</h2>
            
            <form action="{{ route('admin.photo.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>TEMPORADA</label>
                    <input type="text" name="season_name" required placeholder="Ej: Temporada 2025-2026">
                </div>

                <div class="form-group">
                    <label>NOMBRE DEL EVENTO / PARTIDO</label>
                    <input type="text" name="event_name" required placeholder="Ej: Atlantes vs Escoriones">
                </div>

                <div class="form-group">
                    <label>SELECCIONAR FOTOS (Puedes elegir varias a la vez)</label>
                    <input type="file" name="photos[]" multiple required accept="image/*">
                    <small style="color: var(--texto-gris); display: block; margin-top: 5px;">Mantén pulsado Ctrl (o Cmd en Mac) al elegir fotos para subir varias.</small>
                </div>

                <button type="submit" class="btn-submit" style="background-color: #08d7ea; color: #000;">SUBIR ÁLBUM <i class="fa-solid fa-cloud-arrow-up"></i></button>
            </form>
        </div>

    </div>

</body>
</html>