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
                                <a onclick="showConfirmationDialog('{{ route('delete-electeur', $electeur->id) }}')"
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
                    <p>Êtes-vous sûr de vouloir supprimer ce electeur ?</p>
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