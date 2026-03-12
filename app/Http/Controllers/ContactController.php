<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validamos todos los campos del formulario
        $request->validate([
            'name'          => 'required|string|max:255',
            'phone'         => 'required|string|max:20',
            'age'           => 'nullable|integer|min:5|max:99',
            'team_interest' => 'nullable|in:Senior Femenino,Senior Masculino,Categorías Inferiores,No lo sé / Otro',
        ]);

        // 2. Creamos el contacto en la base de datos con campos separados
        $contact = new Contact();
        $contact->name          = $request->name;
        $contact->phone         = $request->phone;
        $contact->age           = $request->age;
        $contact->has_experience = $request->has('has_experience'); // true si marcaron la casilla
        $contact->team_interest = $request->input('team_interest', 'No especificado');
        $contact->message       = $request->message;

        $contact->save();

        // 3. Devolvemos al usuario a la misma página con un mensaje de éxito
        return back()->with('success', '¡Genial! Nos pondremos en contacto contigo muy pronto para que vengas a probar.');
    }
}
