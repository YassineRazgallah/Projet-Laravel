@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header bg-info text-white"> Editer un Electeur</div>
            <div class="card-body">
                <form action="{{ route('update.electeur', $electeur->id) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" id="nom" class="form-control" value="{{ $electeur->nom }}">
                    </div>

                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input type="text" name="prenom" id="prenom" class="form-control" value="{{ $electeur->prenom }}">
                    </div>

                    <div class="form-group">
                        <label for="cni">CNI</label>
                        <input type="integer" name="cni" id="cni" class="form-control" value="{{ $electeur->cni }}">
                    </div>

                    <div class="form-group">
                        <label for="candidat_id">Candidat</label>
                        <select name="candidat_id" id="candidat_id" class="form-control">
                            <option value="">Sélectionnez un candidat</option>
                            @foreach ($candidats as $candidat)
                                <option value="{{ $candidat->id }}" @if ($candidat->id == $electeur->candidat_id) selected @endif>{{ $candidat->nom }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success">Modifier</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
