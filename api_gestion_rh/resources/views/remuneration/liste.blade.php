@extends('layouts.admin')

@section('title', 'Liste des Rémunérations')

@section('content')

<div class="container mt-4">
    <div class="row mb-3">
        <div class="col-9">
            <h1>Liste des Rémunérations</h1>
        </div>
        <div class="col-3 text-end">
            <button class="btn btn-primary">
                <a href="{{ url('/formulaireAjout') }}" style="text-decoration: none; color: white;">Ajouter une
                    Rémunération</a>
            </button>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-bordered" id="dt">
                <thead class="table-light">
                    <tr>
                        <th>Date</th>
                        <th>Salaire Brut</th>
                        <th>Primes</th>
                        <th>Impôts</th>
                        <th>Sécurité Sociale</th>
                        <th>Salaire Net</th>
                        <th>Modifier</th>
                        <th>Archiver</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($Fiche_de_paies as $Fiche_de_paie)
                        <tr>
                            <td>{{ $Fiche_de_paie->date_fiche_de_paie }}</td>
                            <td>{{ $Fiche_de_paie->salaire_brut }} </td>
                            <td>{{ $Fiche_de_paie->primes }} </td>
                            <td>{{ $Fiche_de_paie->impots }} </td>
                            <td>{{ $Fiche_de_paie->securite_sociale }} </td>
                            <td>{{ $Fiche_de_paie->salaire_net }} </td>
                            <td>
                                <button class="btn btn-success">
                                    <a href="{{ url('/Fiche_de_paie/' . $Fiche_de_paie->id . '/editer') }}"
                                        style="text-decoration: none; color: white;">Modifier</a>
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-danger">
                                    <a href="{{ route('archiver_Fiche_de_paie', ['id' => $Fiche_de_paie->id]) }}"
                                        style="text-decoration: none; color: white;">Archiver</a>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection