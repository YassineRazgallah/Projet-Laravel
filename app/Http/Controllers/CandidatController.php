<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use Illuminate\Http\Request;
use App\Services\ServicesCandidat\CandidatService;
use App\Services\ServicesCandidat\CandidatUpdateService;


class CandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('candidat.ajouter');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function liste()
    {
        $candidat = Candidat::all();

        return view('candidat.liste', compact('candidat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CandidatService $candidatService)
    {
        $candidatService->saveCandidat($request);

        return redirect()->back()->with('success', 'Candidat Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $candidat = Candidat::find($id);

        return view('candidat.editer', compact('candidat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, $id, CandidatUpdateService $candidatService)
    {
        $nom = $request->nom;
        $prenom = $request->prenom;
        $dateNaissance = $request->dateNaissance;
        $parti = $request->parti;

        $result = $candidatService->updateCandidat($id, $nom, $prenom, $dateNaissance, $parti);

        if ($result) {
            return redirect()->route('liste.candidat')->with('success', 'Candidat updated');
        } else {
            return redirect()->back()->withErrors(['Erreur lors de la mise à jour du candidat']);
        }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $candidat = Candidat::find($id);
        $candidat->delete();
        return back();
    }
}
