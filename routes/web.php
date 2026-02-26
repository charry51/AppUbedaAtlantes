<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Models\Game; // <-- IMPORTANTE AÑADIR ESTO
use App\Models\Post;
use App\Models\Season;
use Illuminate\Http\Request;

// Ruta principal modificada
Route::get('/', function () {
    // Buscamos el partido cuya fecha sea mayor a "ahora" y cogemos el más cercano
    $nextGame = Game::where('fecha', '>=', now())->orderBy('fecha', 'asc')->first();
    
    // Le pasamos ese partido a la vista
    return view('welcome', compact('nextGame'));
});

// La ruta de contacto que ya teníamos
Route::post('/contacto', [ContactController::class, 'store'])->name('contacto.store');

Route::get('/documentacion', function () {
    return view('documentacion');
})->name('documentacion');

Route::get('/privacidad', function () {
    return view('privacidad');
})->name('privacidad');

Route::get('/aviso-legal', function () {
    return view('aviso-legal');
})->name('aviso-legal');

Route::get('/cookies', function () {
    return view('cookies');
})->name('cookies');

use App\Http\Controllers\AuthController;

// --- RUTAS PÚBLICAS PARA EL BLOG Y LA GALERÍA ---
Route::get('/blog', function () {
    // Traemos todas las noticias ordenadas de más nuevas a más viejas
    $posts = Post::orderBy('created_at', 'desc')->get();
    return view('blog', compact('posts'));
})->name('blog');

Route::get('/galeria', function (Request $request) {
    // Traemos las temporadas con sus eventos y fotos
    $seasons = Season::with('events.photos')->orderBy('created_at', 'desc')->get();

    // Cogemos la temporada del menú desplegable (o la más reciente por defecto)
    $selectedSeasonId = $request->input('temporada', $seasons->first()->id ?? null);
    $temporadaActiva = Season::with('events.photos')->find($selectedSeasonId);

    return view('galeria', compact('seasons', 'temporadaActiva'));
})->name('galeria');

// --- ZONA DE AUTENTICACIÓN (LOGIN) ---
// Estas rutas muestran el formulario y procesan la entrada
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

use App\Http\Controllers\AdminController;

// --- ZONA PRIVADA (EL VESTUARIO) ---
Route::middleware('auth')->group(function () {
    
    // Ver el panel
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    
    // Guardar el partido desde el panel
    Route::post('/admin/partido', [AdminController::class, 'guardarPartido'])->name('admin.partido.store');

    // --- RUTAS NUEVAS PARA BLOG Y FOTOS ---
    Route::post('/admin/blog/store', [AdminController::class, 'guardarPost'])->name('admin.post.store');

    Route::post('/admin/fotos/store', [AdminController::class, 'guardarFotos'])->name('admin.photo.store');

    // --- (Movido aquí dentro por seguridad) ---
    Route::delete('/admin/recluta/{id}', [AdminController::class, 'eliminarRecluta'])->name('admin.recluta.delete');

});