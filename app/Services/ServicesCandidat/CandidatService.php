<?php

namespace App\Services\ServicesCandidat;

use App\Models\Candidat;
use Illuminate\Http\Request;
class CandidatService
{
    public function saveCandidat(Request $request)
{
    $candidat = new Candidat();

    $candidat->nom = $request->nom;
    $candidat->prenom = $request->prenom;
    $candidat->dateNaissance = $request->dateNaissance;
    $candidat->parti = $request->parti;

    $candidat->save();
}
}
