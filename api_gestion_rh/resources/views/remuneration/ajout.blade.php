@extends('layouts.admin')

@section('title', 'Ajouter un bulletin de pai')

@section('content')

<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background-color: #218838;
        }
    </style>
<div class="form-container" >

<div class="container">
    <h1>Création de Fiche de Paie</h1>
   
<form action="{{ url('/creerFiche_de_paie') }}" method="POST">
    @csrf
    <input type="hidden" name="id_employe" value="{{ $employe->id }}"> 

    <label for="date_fiche_de_paie">Date de la Fiche de Paie</label>
    <input type="date" id="date_fiche_de_paie" name="date_fiche_de_paie" required>

    <label for="salaire_brut">Salaire Brut</label>
    <input type="number" id="salaire_brut" name="salaire_brut" required>

    <label for="primes">Primes</label>
    <input type="number" id="primes" name="primes" required>

    <label for="impots">Impôts</label>
    <input type="number" id="impots" name="impots" required>

    <label for="securite_sociale">Sécurité Sociale</label>
    <input type="number" id="securite_sociale" name="securite_sociale" required>

    <label for="autre_retenus">Autres Retenus</label>
    <input type="number" id="autre_retenus" name="autre_retenus" required>

    <label for="salaire_net">Salaire Net</label>
    <input type="number" id="salaire_net" name="salaire_net" required>

    <button type="submit">Créer Fiche de Paie</button>
</form>
</div>
   
    


@endsection