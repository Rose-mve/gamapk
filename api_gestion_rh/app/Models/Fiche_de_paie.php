<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fiche_de_paie extends Model
{
    use HasFactory;
            protected $fillable = [
      
            'date_fiche_de_paie',
             'salaire_brut',
             'primes',
             'impots',
             'securite_sociale',
             'autre_retenus',
             'salaire_net',
             'id_employe',
             'statut',
         ];
   
}
