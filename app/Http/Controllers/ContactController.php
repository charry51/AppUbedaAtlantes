<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact; // Importamos el modelo que creaste antes

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validamos que nos manden al menos nombre y teléfono
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        // 2. Creamos un nuevo contacto en la base de datos
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->age = $request->age;
        $contact->has_experience = $request->has('has_experience'); // Devuelve true si marcaron la casilla
        $contact->message = $request->message;
        $contact->save();

        // 3. Devolvemos al usuario a la misma página con un mensaje de éxito
        return back()->with('success', '¡Genial! Nos pondremos en contacto contigo muy pronto para que vengas a probar.');
    }
}
