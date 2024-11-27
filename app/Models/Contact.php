<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    // Si le nom de la table n'est pas le même que le nom du modèle pluriel (ici c'est 'contacts')
    protected $table = 'contacts';

    // Définir les colonnes autorisées pour l'insertion en masse
    protected $fillable = [
        'nom',
        'prenom',
        'numero',
    ];
}
