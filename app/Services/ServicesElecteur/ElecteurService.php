<?php

namespace App\Services\ServicesElecteur;

use App\Models\Electeur;
use Illuminate\Http\Request;

class ElecteurService
{
    public function saveElecteur(Request $request)
    {
        $electeur = new Electeur();

        $electeur->nom = $request->nom;
        $electeur->prenom = $request->prenom;
        $electeur->cni = $request->cni;
        $electeur->candidat_id = $request->candidat_id;

        $electeur->save();
    }
}
