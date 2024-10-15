<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom' ,
      'prenom', 
        'genre' ,
        'profession',
       'matricule',
        'tel' ,
        'email',
        'photo',
        'statut' ,
    ];

    public function courriers()
    {
        return $this->hasMany(Courrier::class, 'id_employe');
    }

    public function fiche_de_paies()
    {
        return $this->hasMany(Fiche_de_paie::class, 'id_employe');
    }

    public function contrats()
    {
        return $this->hasMany(Contrat::class, 'id_employe');
    }





}
