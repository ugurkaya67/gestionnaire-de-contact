<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

// Route pour afficher les contacts
Route::get('/', [ContactController::class, 'index'])->name('contacts.index');

// Route pour ajouter un contact
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');

// Route pour supprimer un contact
Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
