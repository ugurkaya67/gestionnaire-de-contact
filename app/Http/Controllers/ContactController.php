<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Méthode pour afficher tous les contacts
    public function index()
    {
        // Récupère tous les contacts
        $contacts = Contact::all();

        // Retourne la vue "welcome" avec la variable $contacts
        return view('welcome', compact('contacts'));
    }

    // Méthode pour ajouter un contact
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'numero' => 'required|string|max:255',
        ]);

        // Création du contact
        Contact::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'numero' => $request->numero,
        ]);

        // Redirection vers la page d'accueil avec un message de succès
        return redirect()->route('contacts.index')->with('success', 'Contact ajouté avec succès !');
    }
}
