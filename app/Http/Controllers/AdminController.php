<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Game;
use App\Models\Post;
use App\Models\Season;
use App\Models\Event;
use App\Models\Photo;

class AdminController extends Controller
{
    // 1. Cargar la pantalla del panel con los datos
    public function index()
    {
        // Traemos todos los novatos, del más reciente al más antiguo
        $contactos = Contact::orderBy('created_at', 'desc')->get();
        
        return view('admin.dashboard', compact('contactos'));
    }

    // 2. Guardar un nuevo partido y publicarlo en la web
    public function guardarPartido(Request $request)
    {
        $partido = new Game();
        $partido->rival = $request->rival;
        $partido->fecha = $request->fecha;
        $partido->lugar = $request->lugar;
        // Si el checkbox está marcado, es true (1), si no, false (0)
        $partido->es_local = $request->has('es_local') ? 1 : 0;

        // Si el míster sube una foto del escudo rival, la guardamos
        if ($request->hasFile('rival_logo')) {
            $file = $request->file('rival_logo');
            $nombreArchivo = 'rival_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $nombreArchivo);
            $partido->rival_logo = $nombreArchivo;
        }

        $partido->save();

        return back()->with('success', '¡El marcador de la web pública ha sido actualizado!');
    }

    // Eliminar un recluta de la lista
public function eliminarRecluta($id)
{
    $recluta = Contact::findOrFail($id);
    $recluta->delete();

    return back()->with('success', 'Recluta gestionado y eliminado de la lista.');
}

// ----------------------------------------------------
    // LÓGICA DEL BLOG
    // ----------------------------------------------------
    public function guardarPost(Request $request)
    {
        // 1. Validamos que nos mandan todo lo necesario
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|max:2048' // Máximo 2MB
        ]);

        // 2. Guardamos la foto en la carpeta public/storage/blog
        $rutaImagen = $request->file('image')->store('blog', 'public');

        // 3. Creamos el registro en la base de datos
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $rutaImagen
        ]);

        // 4. Devolvemos al Míster a su panel con un mensaje de éxito
        return back()->with('success', '¡Noticia publicada con éxito en el Blog!');
    }

    // ----------------------------------------------------
    // LÓGICA DE LA GALERÍA DE FOTOS
    // ----------------------------------------------------
    public function guardarFotos(Request $request)
    {
        // 1. Validamos los datos y el array de fotos
        $request->validate([
            'season_name' => 'required',
            'event_name' => 'required',
            'photos.*' => 'required|image|max:2048'
        ]);

        // 2. MAGIA: Buscamos si la Temporada ya existe. Si no, la creamos.
        $temporada = Season::firstOrCreate([
            'name' => $request->season_name
        ]);

        // 3. Buscamos o creamos el Evento (partido) dentro de esa temporada concreta
        $evento = Event::firstOrCreate([
            'season_id' => $temporada->id,
            'name' => $request->event_name
        ]);

        // 4. Bucle para subir todas las fotos seleccionadas
        if($request->hasFile('photos')) {
            foreach($request->file('photos') as $foto) {
                // Guardamos cada foto en public/storage/galeria
                $rutaFoto = $foto->store('galeria', 'public');
                
                // Conectamos la foto con su evento en la base de datos
                Photo::create([
                    'event_id' => $evento->id,
                    'image_path' => $rutaFoto
                ]);
            }
        }

        return back()->with('success', '¡Álbum guardado con éxito en la Galería!');
    }
}