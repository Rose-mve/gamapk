@extends('layouts.admin')

@section('title', 'Ajouter un Employé')

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
        display:flex; 
        flex: 1 1 45%; 
        margin: 10px;
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
        transition: background-color 0.3s;
        margin-top: 20px;
    }
    button:hover {
        background-color: #0056b3;
    }
    .error {
        color: red;
        font-size: 0.9em;
        margin-top: 5px;
    }
</style>

<div class="form-container" >
   
    <h2>Créer un Employé</h2>
    <form action="{{ url('/creeremploye') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" required>
            @error('nom')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom" required>
            @error('prenom')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="genre">Genre</label>
            <select id="genre" name="genre" required>
                <option value="">Sélectionnez</option>
                <option value="Homme">Homme</option>
                <option value="Femme">Femme</option>
            </select>
            @error('genre')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="profession">Profession</label>
            <input type="text" id="profession" name="profession" required>
            @error('profession')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
      
        <div class="form-group">
            <label for="tel">Téléphone</label>
            <input type="text" id="tel" name="tel" required>
            @error('tel')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" id="photo" name="photo" required>
            @error('photo')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
    
        <div class="form-group">
            <label for="date_debut_contrat">Date de début du contrat</label>
            <input type="date" id="date_debut_contrat" name="date_debut_contrat" required>
            @error('date_debut_contrat')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="date_fin_contrat">Date de fin du contrat</label>
            <input type="date" id="date_fin_contrat" name="date_fin_contrat" required>
            @error('date_fin_contrat')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="type_contrat">Type de contrat</label>
            <select id="type_contrat" name="type_contrat" required>
                <option value="">Sélectionnez</option>
                <option value="CDD">CDD</option>
                <option value="CDI">CDI</option>
                <option value="Stage">Stage</option>
            </select>
            @error('type_contrat')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="salaire">Salaire</label>
            <input type="number" id="salaire" name="salaire" required>
            @error('salaire')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Ajouter</button>
    </form>
   
   

</div>

@endsection