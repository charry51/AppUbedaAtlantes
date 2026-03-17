<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Models\Post;
use App\Models\Season;

// Ruta principal
Route::get('/', [HomeController::class, 'index'])->name('home');

// --- NUEVAS RUTAS PÚBLICAS INDEPENDIENTES (BLOQUE 1) ---
Route::get('/historia', function () {
    return view('historia');
})->name('historia');

Route::get('/equipo-femenino', function () {
    return view('femenino');
})->name('femenino');

Route::get('/patrocinadores', function () {
    $sponsors = \App\Models\Sponsor::orderBy('orden', 'asc')->get();
    return view('patrocinadores', compact('sponsors'));
})->name('patrocinadores');

Route::get('/escuela', function () {
    return view('escuela');
})->name('escuela');

// Nueva ruta GET para MOSTRAR la página de contacto
Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');

// La ruta POST que ya tenías para PROCESAR el formulario
Route::post('/contacto', [ContactController::class , 'store'])->name('contacto.store');
// --------------------------------------------------------

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

// --- RUTAS PÚBLICAS PARA EL BLOG Y LA GALERÍA ---
Route::get('/blog', function () {
    $posts = Post::orderBy('created_at', 'desc')->paginate(6);
    return view('blog', compact('posts'));
})->name('blog');

// ¡AQUÍ ESTÁ EL ARREGLO! Pasamos la pelota al HomeController
Route::get('/galeria', [HomeController::class, 'galeria'])->name('galeria');

// --- ZONA DE AUTENTICACIÓN (LOGIN) ---
Route::get('/login', [AuthController::class , 'showLogin'])->name('login');
Route::post('/login', [AuthController::class , 'login']);
Route::post('/logout', [AuthController::class , 'logout'])->name('logout');

// --- ZONA PRIVADA (EL VESTUARIO) ---
Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class , 'index'])->name('admin.dashboard');
    Route::post('/admin/partido', [AdminController::class , 'guardarPartido'])->name('admin.partido.store');
    Route::post('/admin/blog/store', [AdminController::class , 'guardarPost'])->name('admin.post.store');
    Route::post('/admin/fotos/store', [AdminController::class , 'guardarFotos'])->name('admin.photo.store');
    Route::delete('/admin/recluta/{id}', [AdminController::class , 'eliminarRecluta'])->name('admin.recluta.delete');
    Route::post('/admin/patrocinadores/store', [AdminController::class , 'guardarPatrocinador'])->name('admin.sponsor.store');
    Route::delete('/admin/partidos/{id}', [AdminController::class, 'eliminarPartido'])->name('admin.partido.delete');
    Route::delete('/admin/posts/{id}', [AdminController::class, 'eliminarPost'])->name('admin.post.delete');
    Route::delete('/admin/sponsors/{id}', [AdminController::class, 'eliminarSponsor'])->name('admin.sponsor.delete');
});

// Túnel de emergencia para ver las fotos si el storage:link falla en Mac
Route::get('/ver-foto/{path}', function ($path) {
    // Deshacemos el cambio de guiones por barras
    $path = str_replace('-', '/', $path);
    $fullPath = storage_path('app/public/' . $path);
    
    if (!file_exists($fullPath)) {
        return response()->file(public_path('images/logo.png')); // Si falla, que salga el logo del club
    }
    
    return response()->file($fullPath);
})->where('path', '.*')->name('foto.directa');

Route::get('/fuerza-link', function () {
    $target = storage_path('app/public');
    $link = public_path('storage');
    if (file_exists($link)) {
        return "El enlace ya existe. Prueba a borrar la carpeta 'storage' dentro de 'public' por FTP/Administrador de archivos y refresca esta ruta.";
    }
    symlink($target, $link);
    return "¡Puente de fotos creado con éxito!";
});