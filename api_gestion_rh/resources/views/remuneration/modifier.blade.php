
@extends('layouts.admin')

@section('title','modifier employe')

@section('content')



<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
    }
    .form-container {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        max-width: 1200px; 
        margin: auto;
        display: flex;
        flex-wrap: wrap;
    }
    h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
        width: 100%;
    }
    .form-group {
        display: flex; 
        flex: 1 1 45%; 
        margin: 10px;
        min-width: 300px; /* Largeur minimale pour les petits écrans */
    }
    label {
        flex: 1; 
        margin-right: 10px; 
        color: #555;
        align-self: center; 
    }
    input[type="text"],
    input[type="email"],
    input[type="tel"],
    input[type="date"],
    select,
    input[type="file"],
    input[type="number"] {
        flex: 2;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        transition: border-color 0.3s;
    }
    input:focus,
    select:focus {
        border-color: #007bff;
    }
    button {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s, transform 0.2s;
        margin-top: 20px;
    }
    button:hover {
        background-color: #0056b3;
        transform: scale(1.02); 
    }
    .error {
        color: red;
        font-size: 0.9em;
        margin-top: 5px;
    }
    @media (max-width: 768px) {
        .form-group {
            flex: 1 1 100%; 
        }
    }
</style>

<div>
    <h2>modifier la fiche de paie</h2>
    <div><form action="{{ url('/Fiche_de_paie/' . $Fiche_de_paie->id . '/modifier') }}" method="post">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="date_fiche_de_paie">Date de la Fiche de Paie</label>
        <input type="date" id="date_fiche_de_paie" name="date_fiche_de_paie" value="{{ old('date_fiche_de_paie', $Fiche_de_paie->date_fiche_de_paie) }}" required>
        @error('date_fiche_de_paie')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="salaire_brut">Salaire Brut</label>
        <input type="number" id="salaire_brut" name="salaire_brut" value="{{ old('salaire_brut', $Fiche_de_paie->salaire_brut) }}" required>
        @error('salaire_brut')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="primes">Primes</label>
        <input type="number" id="primes" name="primes" value="{{ old('primes', $Fiche_de_paie->primes) }}" required>
        @error('primes')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="impots">Impôts</label>
        <input type="number" id="impots" name="impots" value="{{ old('impots', $Fiche_de_paie->impots) }}" required>
        @error('impots')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="securite_sociale">Sécurité Sociale</label>
        <input type="number" id="securite_sociale" name="securite_sociale" value="{{ old('securite_sociale', $Fiche_de_paie->securite_sociale) }}" required>
        @error('securite_sociale')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="autre_retenus">Autres Retenus</label>
        <input type="number" id="autre_retenus" name="autre_retenus" value="{{ old('autre_retenus', $Fiche_de_paie->autre_retenus) }}" required>
        @error('autre_retenus')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="salaire_net">Salaire Net</label>
        <input type="number" id="salaire_net" name="salaire_net" value="{{ old('salaire_net', $Fiche_de_paie->salaire_net) }}" required>
        @error('salaire_net')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>


    <div class="form-group">
        <label for="id_employe">ID Employé</label>
        <input type="number" id="id_employe" name="id_employe" value="{{ old('id_employe', $Fiche_de_paie->id_employe) }}" required>
        @error('id_employe')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit">Modifier</button>
</form></div>
</div>




@endsection