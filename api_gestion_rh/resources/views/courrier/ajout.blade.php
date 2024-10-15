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
        display: flex;
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

<div class="form-container">

    <h2>envoyer une sanction</h2>
    <form action="{{ url('/sanction') }}" method="POST" enctype="multipart/form-data">

        @csrf
     
        <div class="form-group">
            <label for="date_du_courrier">Date du Courrier</label>
            <input type="date" id="date_du_courrier" name="date_du_courrier">
            @error('date_du_courrier')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="type_de_courrier">Type de Courrier</label>
            <select id="type_de_courrier" name="type_de_courrier" required type="text">
                <option value="">Sélectionnez</option>
                <option value="sanction" >Sanction</option>
                <option value="avenant">Avenant</option>
            </select>
            @error('type_de_courrier')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="date_debut">Date de Début</label>
            <input type="date" id="date_debut" name="date_debut">
            @error('date_debut')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="date_fin">Date de Fin</label>
            <input type="date" id="date_fin" name="date_fin">
            @error('date_fin')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="motif">Motif</label>
            <input type="text" id="motif" name="motif">
            @error('motif')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        

        <div class="form-group">
            <label for="type_de_sanction">Type de Sanction</label>
            <select id="type_de_sanction" name="type_de_sanction" required type="text">
                <option value="">Sélectionnez</option>
                <option value="Avertissement">Avertissement</option>
                <option value="Blâme">Blâme</option>
                <option value="Suspension">Suspension</option>
                <option value="Licenciement">Licenciement</option>
            </select>
            @error('type_de_sanction')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="mesure_corrective">Mesure Corrective</label>
            <input type="text" id="mesure_corrective" name="mesure_corrective">
            @error('mesure_corrective')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>


        <input type="hidden" name="id_employe" value="{{ $employe->id }}">

        <button type="submit">Sanctionner</button>
    </form>


</div>

@endsection