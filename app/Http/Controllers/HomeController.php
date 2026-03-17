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
        // 1. Traemos las temporadas disponibles que tengan al menos un evento
        $seasons = \App\Models\Season::has('events')->orderBy('name', 'desc')->get();

        // 2. Preparamos la consulta de eventos (solo los que tienen fotos)
        $query = \App\Models\Event::with('photos')->has('photos');

        // 3. FILTRO CORRECTO: Filtramos por el ID numérico que nos manda el <select>
        if ($request->filled('season_id')) {
            $query->where('season_id', $request->season_id);
        }

        // 4. Ejecutamos la consulta ordenando por fecha
        $events = $query->orderBy('created_at', 'desc')->get();

        return view('galeria', compact('events', 'seasons'));
    }
}
