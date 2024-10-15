<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courrier extends Model
{
    use HasFactory;
    protected $fillable = [
        'date_du_courrier',
        'type_de_courrier',
        'date_debut',
        'date_fin',
        'motif',
        'fichier_justificatif',
        'type_de_sanction',
        'mesure_corrective',
        'statut',
        'id_employe',
    ];






}
