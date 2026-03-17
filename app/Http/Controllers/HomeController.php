<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Post;
use App\Models\Season;

class HomeController extends Controller
{
    /**
     * Muestra la página principal con el próximo partido y los partidos programados.
     * Lógica movida desde routes/web.php para seguir el patrón MVC.
     */
    public function index()
    {
        // Buscamos el partido cuya fecha sea mayor a "ahora" y cogemos el más cercano
        $nextGame = Game::where('fecha', '>=', now())->orderBy('fecha', 'asc')->first();

        // Obtenemos los siguientes partidos programados excluyendo el primero
        $upcomingGames = collect();
        if ($nextGame) {
            $upcomingGames = Game::where('fecha', '>=', now())
                ->where('id', '!=', $nextGame->id)
                ->orderBy('fecha', 'asc')
                ->take(3)
                ->get();
        }

        return view('welcome', compact('nextGame', 'upcomingGames'));
    }

    public function galeria(\Illuminate\Http\Request $request)
    {
        // Traemos todas las temporadas para pintar el desplegable
        $seasons = \App\Models\Season::orderBy('name', 'desc')->get();

        // Preparamos la consulta de eventos con sus fotos
        $query = \App\Models\Event::with('photos');

        // Si el usuario selecciona una temporada en el desplegable, filtramos
        if ($request->filled('season_id')) {
            $query->where('season_id', $request->season_id);
        }

        // Ejecutamos la búsqueda (ordenando del más nuevo al más antiguo)
        $events = $query->orderBy('created_at', 'desc')->get();

        // Enviamos las variables a la vista
        return view('galeria', compact('events', 'seasons'));
    }
}
