@extends('layouts.admin')

@section('title', 'consulter')

@section('content')

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
        padding: 0;
        background-color: #f4f4f4;
    }

    .container {
        display: flex;
        gap: 20px;
    }

    .detail_employee {
        flex: 2;
        /* Prend plus de place */
        background: white;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    .autres-infos {
        flex: 1;
        /* Prend moins de place */
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .box {
        background: white;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    h2 {
        margin: 0 0 10px;
    }
</style>
</head>

<body>

    <div class="container">

        <div class="detail_employee">

            <h2>informations de l'employé {{ $employee->nom }}</h2>
            <img src="{{ asset('storage/' . $employee->photo) }}" alt="Photo de {{ $employee->nom }}"
                class="img-thumbnail" style="max-width: 100px; max-height: 100px;">

            <p><strong>Nom:</strong> {{  $employee->prenom }}</p>
            <p><strong>Nom:</strong> {{  $employee->genre }}</p>
            <p><strong>Nom:</strong> {{ $employee->profession }}</p>
            <p><strong>Nom:</strong> {{$employee->tel }}</p>
            <p><strong>Nom:</strong> {{  $employee->email }}</p>
           <p><strong>Nom:</strong> {{ $infocontrat[0]['date_debut_contrat'] }}</p>
            <p><strong>Nom:</strong> {{ $infocontrat[0]['date_fin_contrat']}}</p>
            <p><strong>Nom:</strong> {{ $infocontrat[0]['type_contrat'] }}</p>
            <p><strong>Nom:</strong> {{$infocontrat[0]['salaire'] }}</p>


        </div>
        <div class="autres-infos">

<div class="box">
    <h2> - Fiches de Paie</h2>

    <table class="table table-striped table-bordered" id="dt">
        <thead>
            <tr>
                <th>Date</th>
                <th>Salaire Brut</th>
                <th>Primes</th>
                <th>Impôts</th>
                <th>Sécurité Sociale</th>
                <th>Salaire Net</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employee->fiche_de_paies as $Fiche_de_paie)
                <tr>
                    <td>{{ $Fiche_de_paie->date_fiche_de_paie }}</td>
                    <td>{{ $Fiche_de_paie->salaire_brut }} </td>
                    <td>{{ $Fiche_de_paie->primes }} </td>
                    <td>{{ $Fiche_de_paie->impots }} </td>
                    <td>{{ $Fiche_de_paie->securite_sociale }} </td>
                    <td>{{ $Fiche_de_paie->salaire_net }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


<div class="box">
    <h2>Courriers</h2>
    <table class="table table-striped table-bordered" id="dt">
                <thead class="table-light">
                    <tr>
                        <th>Date du Courrier</th>
                        <th>Type de courrier</th>
                        <th>Motif</th>
                        <th>Date de Début</th>
                        <th>Date de Fin</th>
                       
                    </tr>
                </thead>
                <tbody>
                    @foreach($employee->courriers as $courrier)
                        <tr>
                            <td>{{ $courrier->date_du_courrier }}</td>
                            <td>{{ $courrier->type_de_courrier }}</td>
                            <td>{{ $courrier->motif }}</td>
                            <td>{{ $courrier->date_debut }}</td>
                            <td>{{ $courrier->date_fin }}</td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
</div>


<div class="box">
    <h2>Contrats</h2>
    <table class="table table-striped table-bordered" id="dt">
                <thead class="table-light">
                    <tr>
                        <th>Date de début de contrat</th>
                        <th>Date de fin de contrat</th>
                        <th>Type de contrat</th>
                        <th>Salaire:</th>
                       
                    </tr>
                </thead>
                <tbody>
                    @foreach($employee->contrats as $contrat)
                        <tr>
                            <td>{{ $contrat->date_debut_contrat }}</td>
                            <td>{{ $contrat->date_fin_contrat }}</td>
                            <td>{{ $contrat->type_contrat }}</td>
                            <td>{{ $contrat->salaire }}</td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
  
</div>




@endsection