<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Game;

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
}