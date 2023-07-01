@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="card">
            <div class="card-header bg-info text-white">Liste des Electeurs</div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>CNI</th>
                        <th>Candidat</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($electeur as $electeur)
                        <tr>
                            <td>{{ $electeur->id }}</td>
                            <td>{{ $electeur->nom }}</td>
                            <td>{{ $electeur->prenom }}</td>
                            <td>{{ $electeur->cni }}</td>
                            <td>{{ isset($electeur->candidat) ? $electeur->candidat->nom : '' }}</td>
                            <td>
                                <a href="{{ route('edit-electeur', $electeur->id) }}" class="btn btn-warning">Edit</a>
                                <a onclick="return confirm('Do you wish to delete it');"
                                    href="{{ route('delete-electeur', $electeur->id) }}" class="btn btn-danger">Supprimer</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
