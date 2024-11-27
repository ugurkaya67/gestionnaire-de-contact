<?php

namespace App\Http\Controllers;

use App\Models\Contact; // N'oublie pas d'importer le modèle Contact
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        // Récupérer tous les contacts depuis la base de données
        $contacts = Contact::all();

        // Retourner la vue avec les contacts
        return view('welcome', ['contacts' => $contacts]);
    }

    // Autres méthodes (create, store, etc.) si nécessaire
}
