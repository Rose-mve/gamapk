@extends('layouts.admin')

@section('title', 'Liste des Employés')

@section('content')

<div class="container mt-4">
    <div class="row mb-3">
        <div class="col-9">
            <h1>Liste des Employés</h1>
        </div>
        <div class="col-3 text-end">
            <button  class="btn btn-primary"><a  href="{{ url('/formulaireAjoutE') }}" style="text-decoration: none">Ajouter un Employé</a></button>
            
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-bordered" id="dt">
                <thead class="table-light">
                    <tr>
                        <th>Nom</th>
                        <th>Photo</th>
                        <th>consulter</th>
                        <th>remunerer</th>
                        <th>courrier</th>
                        <th>Archiver</th>
                        <th>Modifier</th>
                        <th>Générer le Contrat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $employe)
                        <tr>
                            <td>{{ $employe->nom }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $employe->photo) }}" alt="Photo de {{ $employe->nom }}"
                                    class="img-thumbnail" style="max-width: 100px; max-height: 100px;">
                            </td>
                            <td>
                                <button class="btn btn-primary"> <a
                                        href="{{ url('/consulter/' . $employe->id . '/consulter') }}" style="text-decoration: none">consulter</a></button>

                            </td>
                            <td>
                                <button class="btn btn-primary"> <a
                                        href="{{ url('/employe/' . $employe->id . '/archiver') }}" style="text-decoration: none">Archiver</a></button>

                            </td>
                            <td>
                                <button class="btn btn-primary"> <a
                                        href="{{ url('/formulaireAjout/' . $employe->id . '/remunerer') }}" style="text-decoration: none">remunerer</a></button>

                            </td>
                            <td>
                                <button class="btn btn-success"><a
                                        href=" {{ url('/employe/' . $employe->id . '/editer') }}" style="text-decoration: none">Modifier</a></button>
                            </td>
                           
                            <td>
                                <button class="btn btn-warning">
                                    <a 
                                        href="{{ url('/employe/' . $employe->id . '/genererContrat') }}" style="text-decoration: none">Générer le
                                        Contrat</a>

                                </button>


                            </td>
                            <td>
                                <button class="btn btn-warning">
                                    <a 
                                        href="{{ url('/formulaireAjoutSanction/' . $employe->id . '/courrier') }}" style="text-decoration: none">Générer le
                                        envoyer un courrier</a>

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