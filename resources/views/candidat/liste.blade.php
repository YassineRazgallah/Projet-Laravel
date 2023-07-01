@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="card">
            <div class="card-header bg-info text-white">Liste des Candidats</div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Date Naissance</th>
                        <th>Parti</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($candidat as $candidat)
                        <tr>
                            <td>{{ $candidat->id }}</td>
                            <td>{{ $candidat->nom }}</td>
                            <td>{{ $candidat->prenom }}</td>
                            <td>{{ $candidat->dateNaissance }}</td>
                            <td>{{ $candidat->parti }}</td>
                            <td>
                                <a href="{{ route('edit-candidat', $candidat->id) }}" class="btn btn-warning">Edit</a>
                                <a onclick="showConfirmationDialog('{{ route('delete-candidat', $candidat->id) }}')"
                                    class="btn btn-danger">Supprimer</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <!-- Confirmation Dialog Modal -->
    <div class="modal fade" id="confirmationDialog" tabindex="-1" role="dialog" aria-labelledby="confirmationDialogLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationDialogLabel">Confirmation de suppression</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Êtes-vous sûr de vouloir supprimer ce candidat ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <a id="deleteButton" href="#" class="btn btn-danger">Supprimer</a>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        function showConfirmationDialog(deleteUrl) {
            $('#confirmationDialog').modal('show');
            $('#deleteButton').attr('href', deleteUrl);
        }
    </script>
@endsection
