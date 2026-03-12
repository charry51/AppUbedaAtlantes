<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        // Validamos todos los campos antes de guardar
        $request->validate([
            'rival'      => 'required|string|max:100',
            'fecha'      => 'required|date|after:now',
            'lugar'      => 'required|string|max:200',
            'rival_logo' => 'nullable|image|max:2048',
        ]);

        $partido = new Game();
        $partido->rival    = $request->rival;
        $partido->fecha    = $request->fecha;
        $partido->lugar    = $request->lugar;
        $partido->es_local = $request->has('es_local') ? 1 : 0;

        // Si el míster sube una foto del escudo rival, la guardamos en storage/rivales/
        if ($request->hasFile('rival_logo')) {
            $rutaLogo = $request->file('rival_logo')->store('rivales', 'public');
            $partido->rival_logo = $rutaLogo;
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
            'title'   => 'required|string|max:255',
            'content' => 'required',
            'image'   => 'required|image|max:2048', // Máximo 2MB
        ]);

        // 2. Guardamos la foto en la carpeta public/storage/blog
        $rutaImagen = $request->file('image')->store('blog', 'public');

        // 3. Creamos el registro en la base de datos
        Post::create([
            'title'   => $request->title,
            'content' => $request->content,
            'image'   => $rutaImagen,
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
            'season_name' => 'required|string|max:100',
            'event_name'  => 'required|string|max:200',
            'photos.*'    => 'required|image|max:51200', // Cada foto máximo 50MB
        ]);

        // 2. Buscamos si la Temporada ya existe. Si no, la creamos.
        $temporada = Season::firstOrCreate([
            'name' => $request->season_name,
        ]);

        // 3. Buscamos o creamos el Evento dentro de esa temporada
        $evento = Event::firstOrCreate([
            'season_id' => $temporada->id,
            'name'      => $request->event_name,
        ]);

        // 4. Bucle para subir todas las fotos seleccionadas
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $foto) {
                $rutaFoto = $foto->store('galeria', 'public');
                Photo::create([
                    'event_id'   => $evento->id,
                    'image_path' => $rutaFoto,
                ]);
            }
        }

        return back()->with('success', '¡Álbum guardado con éxito en la Galería!');
    }
}