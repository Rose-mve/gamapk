@extends('layouts.admin')

@section('title', 'modifier employe')

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
        min-width: 300px;
        /* Largeur minimale pour les petits écrans */
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
    <h2>Modifier un Employé</h2>
    <form action="{{ url('/employe/' . $employe->id . '/modifier_employe') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" value="{{ old('nom', $employe->nom) }}" required>
            @error('nom')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom" value="{{ old('prenom', $employe->prenom) }}" required>
            @error('prenom')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="genre">Genre</label>
            <select id="genre" name="genre" required>
                <option value="">Sélectionnez</option>
                <option value="Homme" {{ $employe->genre == 'Homme' ? 'selected' : '' }}>Homme</option>
                <option value="Femme" {{ $employe->genre == 'Femme' ? 'selected' : '' }}>Femme</option>
            </select>
            @error('genre')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="profession">Profession</label>
            <input type="text" id="profession" name="profession" value="{{ old('profession', $employe->profession) }}"
                required>
            @error('profession')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="matricule">Matricule</label>
            <input type="text" id="matricule" name="matricule" value="{{ old('matricule', $employe->matricule) }}"
                required>
            @error('matricule')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="tel">Téléphone</label>
            <input type="text" id="tel" name="tel" value="{{ old('tel', $employe->tel) }}" required>
            @error('tel')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $employe->email) }}" required>
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" id="photo" name="photo">
            @error('photo')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="date_embauche">Date d'embauche</label>
            <input type="date" id="date_embauche" name="date_embauche"
                value="{{ old('date_embauche', $employe->date_embauche) }}" required>
            @error('date_embauche')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="date_debut_contrat">Date de début du contrat</label>
            <input type="date" id="date_debut_contrat" name="date_debut_contrat"
                value="{{ old('date_debut_contrat', $employe->date_debut_contrat) }}" required>
            @error('date_debut_contrat')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="date_fin_contrat">Date de fin du contrat</label>
            <input type="date" id="date_fin_contrat" name="date_fin_contrat"
                value="{{ old('date_fin_contrat', $employe->date_fin_contrat) }}" required>
            @error('date_fin_contrat')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="type_contrat">Type de contrat</label>
            <select id="type_contrat" name="type_contrat" required>
                <option value="">Sélectionnez</option>
                <option value="CDD" {{ $employe->type_contrat == 'CDD' ? 'selected' : '' }}>CDD</option>
                <option value="CDI" {{ $employe->type_contrat == 'CDI' ? 'selected' : '' }}>CDI</option>
                <option value="Stage" {{ $employe->type_contrat == 'Stage' ? 'selected' : '' }}>Stage</option>
            </select>
            @error('type_contrat')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="salaire">Salaire</label>
            <input type="number" id="salaire" name="salaire" value="{{ old('salaire', $employe->salaire) }}" required>
            @error('salaire')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Modifier</button>
    </form>
</div>




@endsection