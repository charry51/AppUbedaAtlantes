<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro de Mandos - Atlantes</title>
    
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Oswald:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body { background-color: #050505; color: #fff; font-family: 'Montserrat', sans-serif; margin: 0; padding: 0; }
        h1, h2, h3 { font-family: 'Oswald', sans-serif; text-transform: uppercase; margin-top: 0; }
        
        /* Barra superior */
        .topbar { background-color: #111; padding: 15px 30px; border-bottom: 2px solid #D91023; display: flex; justify-content: space-between; align-items: center; }
        .topbar img { height: 40px; }
        .btn-logout { background-color: #333; color: white; border: none; padding: 10px 15px; cursor: pointer; border-radius: 4px; font-weight: bold; transition: 0.3s; }
        .btn-logout:hover { background-color: #D91023; }

        /* Contenedor principal a 2 columnas */
        .admin-grid { display: grid; grid-template-columns: 2fr 1fr; gap: 30px; padding: 40px; max-width: 1400px; margin: 0 auto; }
        @media (max-width: 1100px) { .admin-grid { grid-template-columns: 1fr; } }

        .caja-admin { background-color: #111; padding: 25px; border-radius: 8px; border: 1px solid #333; }
        .caja-admin h2 { color: #D91023; border-bottom: 1px solid #333; padding-bottom: 10px; margin-bottom: 20px; }

        /* Tabla de Novatos */
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #222; font-size: 0.9rem; vertical-align: middle; }
        th { color: #aaa; text-transform: uppercase; font-size: 0.8rem; }
        tr:hover { background-color: #1a1a1a; }
        
        /* Estilo para mensajes largos */
        .col-mensaje { 
            max-width: 300px; 
            color: #ccc; 
            font-size: 0.85rem; 
            line-height: 1.4; 
            word-wrap: break-word; 
            white-space: normal; 
        }

        .btn-whatsapp { background-color: #25D366; color: white; padding: 6px 12px; text-decoration: none; border-radius: 4px; font-weight: bold; font-size: 0.8rem; display: inline-block; }
        .btn-delete { background: none; border: none; color: #ff4d4d; cursor: pointer; font-size: 1.1rem; transition: 0.2s; }
        .btn-delete:hover { color: #fff; transform: scale(1.2); }

        /* Formulario del partido */
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-size: 0.85rem; color: #aaa; }
        input[type="text"], input[type="datetime-local"], input[type="file"] { width: 100%; padding: 10px; background: #050505; border: 1px solid #333; color: white; border-radius: 4px; box-sizing: border-box; }
        input:focus { border-color: #D91023; outline: none; }
        
        .check-group { display: flex; align-items: center; gap: 10px; margin-top: 10px; }
        .btn-submit { background-color: #D91023; color: white; border: none; padding: 15px; width: 100%; font-weight: bold; font-family: 'Oswald', sans-serif; font-size: 1.1rem; cursor: pointer; border-radius: 4px; margin-top: 10px; transition: 0.3s; }
        .btn-submit:hover { background-color: white; color: #D91023; }

        .alerta-exito { background-color: rgba(74, 222, 128, 0.1); color: #4ade80; padding: 15px; border-radius: 4px; margin-bottom: 20px; border: 1px solid #4ade80; text-align: center; }
    </style>
</head>
<body>

    <div class="topbar">
        <div style="display: flex; align-items: center; gap: 15px;">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
            <h2 style="margin: 0; color: white;">PANEL DEL MÍSTER</h2>
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
                                <div style="display: flex; gap: 15px; align-items: center;">
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
                    <label for="es_local" style="margin: 0; cursor: pointer; color: white;">Jugamos en Úbeda (Local)</label>
                </div>

                <button type="submit" class="btn-submit">ACTUALIZAR WEB <i class="fa-solid fa-satellite-dish"></i></button>
            </form>
        </div>

    </div>

</body>
</html>