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

    public function galeria(Request $request)
{
    // Traemos temporadas y eventos con sus fotos
    $seasons = \App\Models\Season::orderBy('created_at', 'desc')->get();
    $query = \App\Models\Event::with('photos', 'season');

    if ($request->has('temporada')) {
        $query->where('season_id', $request->temporada);
    }

    $events = $query->orderBy('created_at', 'desc')->get();

    return view('galeria', compact('seasons', 'events'));
}
}
