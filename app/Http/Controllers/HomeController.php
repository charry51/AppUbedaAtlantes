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
        // 1. Traemos las temporadas disponibles
        $seasons = \App\Models\Season::orderBy('name', 'desc')->get();

        // 2. Preparamos los eventos que tengan fotos
        $query = \App\Models\Event::with('photos')->has('photos');

        // 3. EL NUEVO FILTRO CLAVE: Buscamos por el NOMBRE de la temporada, no por el ID
        if ($request->has('season_name') && $request->season_name != '') {
            // Buscamos la temporada por su nombre
            $temporada_elegida = \App\Models\Season::where('name', $request->season_name)->first();
            
            // Si la encuentra, filtramos los eventos por el ID de esa temporada
            if($temporada_elegida) {
                $query->where('season_id', $temporada_elegida->id);
            }
        }

        $events = $query->orderBy('created_at', 'desc')->get();

        return view('galeria', compact('events', 'seasons'));
    }
}
