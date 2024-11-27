<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

// Route pour afficher la page d'accueil et les contacts
Route::get('/', [ContactController::class, 'index']);
