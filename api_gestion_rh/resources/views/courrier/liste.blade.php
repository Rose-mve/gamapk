@extends('layouts.admin')

@section('title', 'Liste des courries$courries')

@section('content')

<div class="container mt-4">
    <div class="row mb-3">
        <div class="col-9">
            <h1>Liste des courriers</h1>
        </div>
        <div class="col-3 text-end">
            <button class="btn btn-primary">
                <a href="{{ url('/formulaireAjoutSanction') }}" style="text-decoration: none; color: white;">Ajouter une courrier</a>
            </button>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
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
                    @foreach($courriers as $courrier)
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
    </div>
</div>

@endsection