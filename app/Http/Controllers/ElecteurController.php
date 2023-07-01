<?php

namespace App\Http\Controllers;
use App\Models\Candidat;
use App\Models\Electeur;
use Illuminate\Http\Request;
use App\Services\ServicesElecteur\ElecteurService ;
class ElecteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidats = Candidat::all();
        return view('Electeur.ajouter')->with('candidats', $candidats);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function liste()
    {
        $electeur = Electeur::all();

        return view('Electeur.liste', compact('electeur'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'cni' => 'required',
            'candidat_id' => 'required',
        ], [
            'nom.required' => 'Le champ nom est obligatoire.',
            'prenom.required' => 'Le champ prénom est obligatoire.',
            'cni.required' => 'Le champ CNI est obligatoire.',
            'candidat_id.required' => 'Le champ candidat_id est obligatoire.',
        ]);
    
        $electeurService = new ElecteurService();
        $electeurService->saveElecteur($request);
    
        return redirect()->back()->with('success', 'Electeur saved');
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
        $electeur = Electeur::find($id);
        $candidats = Candidat::all();
        return view('electeur.editer', compact('electeur', 'candidats'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'nom' => 'required',
        'prenom' => 'required',
        'cni' => 'required',
        'candidat_id' => 'required',
    ], [
        'nom.required' => 'Le champ nom est obligatoire.',
        'prenom.required' => 'Le champ prénom est obligatoire.',
        'cni.required' => 'Le champ CNI est obligatoire.',
        'candidat_id.required' => 'Le champ candidat_id est obligatoire.',
    ]);

    $electeur = Electeur::find($id);
    $electeur->nom = $request->nom;
    $electeur->prenom = $request->prenom;
    $electeur->cni = $request->cni;
    $electeur->candidat_id = $request->candidat_id;

    $electeur->save();

    return redirect()->route('liste.electeur')->with('success', 'Electeur mis à jour avec succès.');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $electeur = Electeur::find($id);
        $electeur->delete();
        return back();
    }
}
