<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    use HasFactory;
    
    protected $fillable = [              
        'date_debut_contrat',
        'date_fin_contrat',
        'type_contrat' ,
        'salaire',
        'contrat_pdf',
        'id_employe',
    ];

}
