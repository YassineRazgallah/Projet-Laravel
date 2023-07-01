<?php

namespace App\Services\ServicesCandidat;

use App\Models\Candidat;

class CandidatUpdateService
{
    public function updateCandidat($id, $nom, $prenom, $dateNaissance, $parti)
    {
        $candidat = Candidat::find($id);

        if (!$candidat) {
            return [
                'success' => false,
                'message' => 'Candidat not found',
            ];
        }

        $candidat->nom = $nom;
        $candidat->prenom = $prenom;
        $candidat->dateNaissance = $dateNaissance;
        $candidat->parti = $parti;

        try {
            $candidat->save();
            return [
                'success' => true,
                'message' => 'Candidat updated successfully',
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Failed to update candidat',
            ];
        }
    }
}
