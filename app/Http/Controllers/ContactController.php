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

    // Méthode pour supprimer un contact
    public function destroy(Contact $contact)
    {
        // Supprimer le contact
        $contact->delete();

        // Rediriger vers la liste des contacts avec un message de succès
        return redirect()->route('contacts.index')->with('success', 'Contact supprimé avec succès !');
    }

    // Méthode pour afficher le formulaire d'édition
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    // Méthode pour mettre à jour un contact
    public function update(Request $request, Contact $contact)
    {
        // Validation des données
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'numero' => 'required|string|max:255',
        ]);

        // Mise à jour du contact
        $contact->update($validated);

        // Redirection avec message de succès
        return redirect()->route('contacts.index')->with('success', 'Contact modifié avec succès');
    }
}
