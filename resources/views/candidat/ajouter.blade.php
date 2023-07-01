@extends('layouts.app')

@section('content')

       <div  class="container">
              @if (session('success'))
              <div class="alert alert success mt-3">
                     {{ session('success') }}
              </div>
              @endif
              <div class="card"></div>
              <div class="card-header bg-info text-white"> Ajouter un Candidat</div>
       </div>

       <div class="card-body">  
              <form action="{{ route('store.candidat')  }}" method="post">
                     @csrf
                     <div class="form goup">
                            <label for="">Nom</label>
                              <input type="text" name="nom" id="" class="form-control">
                     </div>

                     <div class="form goup">
                            <label for="">Prénom</label>
                              <input type="text" name="prenom" id="" class="form-control">
                     </div>

                     <div class="form goup">
                            <label for="">Date Naissance</label>
                              <input type="date" name="dateNaissance" id="" class="form-control">
                     </div>

                     <div class="form goup">
                            <label for="">Parti</label>
                              <input type="text" name="parti" id="" class="form-control">
                     </div>

                     <div class="form group">
                            <button class="btn btn-success"> Enregistrer</button>
                     </div>
                     
              </form>
       </div>
@endsection

