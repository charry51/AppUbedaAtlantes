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
use App\Models\Sponsor;

class AdminController extends Controller
{
    /**
     * PANEL PRINCIPAL: Lista de Reclutas
     */
    public function index()
    {
        $contactos = Contact::orderBy('created_at', 'desc')->get();
        return view('admin.dashboard', compact('contactos'));
    }

    // ----------------------------------------------------
    // GESTIÓN DE ENCUENTROS (PARTIDOS / TORNEOS)
    // ----------------------------------------------------
    public function guardarPartido(Request $request)
    {
        $request->validate([
            'tipo' => 'required|in:partido,torneo',
            'rival' => 'required_if:tipo,partido|nullable|string',
            'nombre_torneo' => 'required_if:tipo,torneo|nullable|string',
            'fecha' => 'required',
            'lugar' => 'required|string',
            'rival_logo' => 'nullable|image|max:2048',
        ]);

        $rutaLogo = null;
        if ($request->hasFile('rival_logo') && $request->tipo == 'partido') {
            $rutaLogo = $request->file('rival_logo')->store('rivales', 'public');
        }

        Game::create([
            'tipo' => $request->tipo,
            'nombre_torneo' => $request->nombre_torneo,
            'rival' => $request->rival,
            'fecha' => $request->fecha,
            'lugar' => $request->lugar,
            'es_local' => $request->has('es_local'),
            'rival_logo' => $rutaLogo,
        ]);

        return redirect()->back()->with(['success' => 'Encuentro publicado correctamente', 'partido_ok' => true]);
    }

    public function editPartido($id) {
        $partido = Game::findOrFail($id);
        return view('admin.edit-partido', compact('partido'));
    }

    public function updatePartido(Request $request, $id) {
        $partido = Game::findOrFail($id);
        
        if ($request->hasFile('rival_logo')) {
            if ($partido->rival_logo) Storage::disk('public')->delete($partido->rival_logo);
            $partido->rival_logo = $request->file('rival_logo')->store('rivales', 'public');
        }

        $partido->update($request->except('rival_logo'));
        $partido->es_local = $request->has('es_local');
        $partido->save();

        return redirect()->route('admin.dashboard')->with('success', 'Encuentro actualizado');
    }

    public function eliminarPartido($id)
    {
        $game = Game::findOrFail($id);
        if ($game->rival_logo) Storage::disk('public')->delete($game->rival_logo);
        $game->delete();
        return redirect()->back()->with('success', 'Partido eliminado del calendario');
    }

    // ----------------------------------------------------
    // GESTIÓN DE BLOG (NOTICIAS Y CRÓNICAS)
    // ----------------------------------------------------
    public function guardarPost(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required',
            'image'   => 'required|image|max:2048',
        ]);

        $rutaImagen = $request->file('image')->store('blog', 'public');

        Post::create([
            'title'   => $request->title,
            'content' => $request->content,
            'image'   => $rutaImagen,
        ]);

        return back()->with('success', '¡Noticia publicada en el Blog!');
    }

    public function editPost($id) {
        $post = Post::findOrFail($id);
        return view('admin.edit-post', compact('post'));
    }

    public function updatePost(Request $request, $id) {
        $post = Post::findOrFail($id);
        $request->validate(['title' => 'required', 'content' => 'required']);

        if ($request->hasFile('image')) {
            if ($post->image) Storage::disk('public')->delete($post->image);
            $post->image = $request->file('image')->store('blog', 'public');
        }

        $post->update(['title' => $request->title, 'content' => $request->content]);
        return redirect()->route('admin.dashboard')->with('success', 'Crónica editada correctamente');
    }

    public function eliminarPost($id)
    {
        $post = Post::findOrFail($id);
        if ($post->image) Storage::disk('public')->delete($post->image);
        $post->delete();
        return redirect()->back()->with('success', 'Crónica eliminada permanentemente');
    }

    // ----------------------------------------------------
    // GESTIÓN DE GALERÍA (LA NUEVA SUBIDA SECUENCIAL)
    // ----------------------------------------------------
    public function guardarFotos(Request $request)
    {
        // 1. Buscamos la temporada o la creamos si es nueva
        $season = \App\Models\Season::firstOrCreate(['name' => $request->season_name]);

        // 2. Buscamos el evento dentro de esa temporada o lo creamos
        $event = \App\Models\Event::firstOrCreate([
            'name' => $request->event_name,
            'season_id' => $season->id
        ]);

        // 3. Guardamos LA foto individual que nos acaba de mandar el Javascript
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('galeria', 'public');
            
            \App\Models\Photo::create([
                'event_id' => $event->id,
                'image_path' => $path
            ]);
        }

        // 4. Devolvemos un OK silencioso para que la barra de progreso avance
        return response()->json(['success' => true]);
    }

    // ----------------------------------------------------
    // GESTIÓN DE PATROCINADORES
    // ----------------------------------------------------
    public function guardarPatrocinador(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'logo'   => 'required|image|max:2048',
            'nivel'  => 'required|string',
        ]);

        $rutaLogo = $request->file('logo')->store('sponsors', 'public');

        Sponsor::create([
            'nombre' => $request->nombre,
            'logo'   => $rutaLogo,
            'enlace' => $request->enlace,
            'nivel'  => $request->nivel,
        ]);

        return redirect()->back()->with('success', '¡Nuevo patrocinador fichado!');
    }

    public function editSponsor($id) {
        $sponsor = Sponsor::findOrFail($id);
        return view('admin.edit-sponsor', compact('sponsor'));
    }

    public function updateSponsor(Request $request, $id) {
        $sponsor = Sponsor::findOrFail($id);
        
        if ($request->hasFile('logo')) {
            if ($sponsor->logo) Storage::disk('public')->delete($sponsor->logo);
            $sponsor->logo = $request->file('logo')->store('sponsors', 'public');
        }
        
        $sponsor->update($request->only(['nombre', 'nivel', 'enlace']));
        return redirect()->route('admin.dashboard')->with('success', 'Datos del patrocinador actualizados');
    }

    public function eliminarSponsor($id)
    {
        $sponsor = Sponsor::findOrFail($id);
        if ($sponsor->logo) Storage::disk('public')->delete($sponsor->logo);
        $sponsor->delete();
        return redirect()->back()->with('success', 'Patrocinador eliminado');
    }

    // ----------------------------------------------------
    // GESTIÓN DE RECLUTAS
    // ----------------------------------------------------
    public function eliminarRecluta($id)
    {
        $recluta = Contact::findOrFail($id);
        $recluta->delete();
        return back()->with('success', 'Recluta gestionado y archivado.');
    }
}