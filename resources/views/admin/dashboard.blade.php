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
                                    <div class="acciones-flex" style="display: flex; gap: 5px; align-items: center;">
                                        <button type="button" onclick='verMensaje(@json($recluta->message))' style="background: #17a2b8; color: white; border: none; padding: 6px 10px; border-radius: 4px; cursor: pointer;" title="Ver mensaje">
                                            <i class="fa-solid fa-envelope"></i>
                                        </button>

                                        <a href="https://wa.me/34{{ str_replace(' ', '', $recluta->phone) }}" target="_blank" class="btn-whatsapp">
                                            <i class="fa-brands fa-whatsapp"></i>
                                        </a>
                                        <form action="{{ route('admin.recluta.delete', $recluta->id) }}" method="POST" onsubmit="return confirm('¿Eliminar de la lista?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn-delete"><i class="fa-solid fa-trash-can"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p style="color: #888; text-align: center; padding: 40px;">No hay nuevos reclutas pendientes.</p>
            @endif
        </div>

        <div class="caja-admin">
            <h2><i class="fa-solid fa-trophy"></i> Gestión de Encuentros</h2>
            
            @if(session('success') && session('partido_ok'))
                <div class="alerta-exito"><i class="fa-solid fa-circle-check"></i> Web actualizada.</div>
            @endif

            <form action="{{ route('admin.partido.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>¿QUÉ SE JUEGA?</label>
                    <select name="tipo" id="tipo_encuentro" onchange="toggleTipo()" style="width: 100%; padding: 10px; background: var(--bg-principal); color: white; border-radius: 4px;">
                        <option value="partido">Partido Único (XV vs XV)</option>
                        <option value="torneo">Torneo / Concentración / Rugby Fest</option>
                    </select>
                </div>

                <div id="campo_rival" class="form-group">
                    <label>EQUIPO RIVAL</label>
                    <input type="text" name="rival" placeholder="Ej: Jaén Rugby">
                </div>

                <div id="campo_torneo" class="form-group" style="display: none;">
                    <label>NOMBRE DEL TORNEO</label>
                    <input type="text" name="nombre_torneo" placeholder="Ej: X Torneo Solidario Ciudad de Úbeda">
                </div>

                <div class="form-group">
                    <label>FECHA Y HORA</label>
                    <input type="datetime-local" name="fecha" required>
                </div>

                <div class="form-group">
                    <label>LUGAR / ESTADIO</label>
                    <input type="text" name="lugar" required placeholder="Ej: Polideportivo Antonio Cruz">
                </div>

                <div id="campo_logo" class="form-group">
                    <label>ESCUDO RIVAL (Opcional)</label>
                    <input type="file" name="rival_logo" accept="image/*">
                </div>

                <div class="check-group form-group">
                    <input type="checkbox" name="es_local" id="es_local" checked>
                    <label for="es_local">Se juega en casa (Úbeda/La Loma)</label>
                </div>

                <button type="submit" class="btn-submit">ACTUALIZAR ENCUENTRO <i class="fa-solid fa-satellite-dish"></i></button>
            </form>

            <hr style="margin: 30px 0; border: 0; border-top: 1px solid #444;">
            <h4 style="color: #888; margin-bottom: 15px;">PARTIDOS PROGRAMADOS:</h4>
            @php $partidos = \App\Models\Game::orderBy('fecha', 'asc')->get(); @endphp
            @foreach($partidos as $p)
                <div style="display: flex; justify-content: space-between; align-items: center; background: rgba(0,0,0,0.2); padding: 10px; border-radius: 4px; margin-bottom: 10px;">
                    <span style="font-size: 0.85rem;">
                        {{ $p->tipo == 'torneo' ? $p->nombre_torneo : 'vs ' . $p->rival }}
                    </span>
                    <form action="{{ route('admin.partido.delete', $p->id) }}" method="POST" onsubmit="return confirm('¿Borrar partido?')">
                        @csrf @method('DELETE')
                        <button type="submit" style="background: none; border: none; color: #ff4d4d; cursor: pointer;"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </div>
            @endforeach
        </div>

        <div class="caja-admin">
            <h2><i class="fa-solid fa-newspaper"></i> Publicar en el Blog</h2>
            <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group"><label>TÍTULO</label><input type="text" name="title" required></div>
                <div class="form-group"><label>IMAGEN</label><input type="file" name="image" required accept="image/*"></div>
                <div class="form-group">
                    <label>CONTENIDO</label>
                    <textarea name="content" rows="6" required style="width: 100%; padding: 12px; background: var(--bg-principal); color: white; border-radius: 4px; font-family: inherit; resize: vertical;"></textarea>
                </div>
                <button type="submit" class="btn-submit">PUBLICAR <i class="fa-solid fa-paper-plane"></i></button>
            </form>

            <hr style="margin: 30px 0; border: 0; border-top: 1px solid #444;">
            <h4 style="color: #888; margin-bottom: 15px;">NOTICIAS PUBLICADAS:</h4>
            @php $posts = \App\Models\Post::latest()->get(); @endphp
            @foreach($posts as $post)
                <div style="display: flex; justify-content: space-between; align-items: center; background: rgba(0,0,0,0.2); padding: 10px; border-radius: 4px; margin-bottom: 5px;">
                    <span style="font-size: 0.85rem; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; max-width: 80%;">{{ $post->title }}</span>
                    <form action="{{ route('admin.post.delete', $post->id) }}" method="POST" onsubmit="return confirm('¿Borrar noticia?')">
                        @csrf @method('DELETE')
                        <button type="submit" style="background: none; border: none; color: #ff4d4d; cursor: pointer;"><i class="fa-solid fa-trash-can"></i></button>
                    </form>
                </div>
            @endforeach
        </div>

        <div class="caja-admin">
            <h2><i class="fa-solid fa-camera-retro"></i> Galería de Fotos</h2>
            <form action="{{ route('admin.photo.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group"><label>TEMPORADA</label><input type="text" name="season_name" required placeholder="2025-2026"></div>
                <div class="form-group"><label>EVENTO</label><input type="text" name="event_name" required></div>
                <div class="form-group">
                    <label>FOTOS</label>
                    <input type="file" name="photos[]" multiple required accept="image/*">
                </div>
                <button type="submit" class="btn-submit" style="background-color: #08d7ea; color: #000;">SUBIR ÁLBUM</button>
            </form>
        </div>

        <div class="caja-admin" style="border-top: 4px solid #FFD700;">
            <h2><i class="fa-solid fa-handshake"></i> Añadir Patrocinador</h2>
            <form action="{{ route('admin.sponsor.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group"><label>EMPRESA</label><input type="text" name="nombre" required></div>
                <div style="display: flex; gap: 15px; margin-bottom: 15px; flex-wrap: wrap;">
                    <div class="form-group" style="flex: 1;"><label>NIVEL</label>
                        <select name="nivel" required style="width: 100%; padding: 12px; background: var(--bg-principal); color: white; border-radius: 4px;">
                            <option value="Oro">Oro</option><option value="Plata">Plata</option><option value="Bronce">Bronce</option><option value="Colaborador">Colaborador</option>
                        </select>
                    </div>
                    <div class="form-group" style="flex: 2;"><label>WEB (URL)</label><input type="url" name="enlace"></div>
                </div>
                <div class="form-group"><label>LOGO</label><input type="file" name="logo" accept="image/*" required></div>
                <button type="submit" class="btn-submit" style="background-color: #FFD700; color: #000;">FICHAR <i class="fa-solid fa-upload"></i></button>
            </form>

            <hr style="margin: 30px 0; border: 0; border-top: 1px solid #444;">
            <h4 style="color: #888; margin-bottom: 15px;">Sponsors Actuales:</h4>
            @php $sponsors_list = \App\Models\Sponsor::all(); @endphp
            @foreach($sponsors_list as $s)
                <div style="display: flex; justify-content: space-between; align-items: center; background: rgba(0,0,0,0.2); padding: 10px; border-radius: 4px; margin-bottom: 5px;">
                    <span style="font-size: 0.85rem;">{{ $s->nombre }} ({{ $s->nivel }})</span>
                    <form action="{{ route('admin.sponsor.delete', $s->id) }}" method="POST" onsubmit="return confirm('¿Eliminar patrocinador?')">
                        @csrf @method('DELETE')
                        <button type="submit" style="background: none; border: none; color: #ff4d4d; cursor: pointer;"><i class="fa-solid fa-trash-can"></i></button>
                    </form>
                </div>
            @endforeach
        </div>

    </div>

    <div id="modalMensajeAdmin" style="display: none; position: fixed; z-index: 10000; left: 0; top: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.8); justify-content: center; align-items: center;">
        <div style="background: #1a1a1a; padding: 25px; border-radius: 8px; border: 1px solid #c91028; max-width: 500px; width: 90%; color: white;">
            <h3 style="margin-top: 0; color: #c91028; font-family: 'Oswald', sans-serif; text-transform: uppercase;">Mensaje del Recluta</h3>
            
            <p id="textoMensajeAdmin" style="white-space: pre-wrap; margin-bottom: 25px; line-height: 1.5; font-size: 1rem; color: #ddd; background: #000; padding: 15px; border-radius: 4px; border: 1px solid #333;"></p>
            
            <div style="text-align: right;">
                <button type="button" onclick="document.getElementById('modalMensajeAdmin').style.display='none'" style="background: #c91028; color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer; font-family: 'Oswald', sans-serif; text-transform: uppercase;">Cerrar</button>
            </div>
        </div>
    </div>

    <script>
    function toggleTipo() {
        const tipo = document.getElementById('tipo_encuentro').value;
        document.getElementById('campo_rival').style.display = tipo === 'partido' ? 'block' : 'none';
        document.getElementById('campo_logo').style.display = tipo === 'partido' ? 'block' : 'none';
        document.getElementById('campo_torneo').style.display = tipo === 'torneo' ? 'block' : 'none';
    }

    function verMensaje(mensaje) {
        // Si hay mensaje lo pintamos, si no, avisamos
        let texto = mensaje ? mensaje : 'Este recluta no ha dejado ningún mensaje, solo dejó sus datos.';
        
        // Lo metemos en el Modal y lo hacemos visible
        document.getElementById('textoMensajeAdmin').innerText = texto;
        document.getElementById('modalMensajeAdmin').style.display = 'flex';
    }
    </script>
</body>
</html>