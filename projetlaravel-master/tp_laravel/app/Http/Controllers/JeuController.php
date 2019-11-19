<?php

namespace App\Http\Controllers;

use App\Models\Jeu;
use Illuminate\Http\Request;

class JeuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jeux = Jeu::all();
        return view('jeux.index', ['jeux' => $jeux]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jeux.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation des données de la requête
        $this->validate(
            $request,
            [
                'nom' => 'required',
                'categorie' => 'required',
                'sortie' => 'required',
                'description' => 'required',
                'age_min' => 'required',
                'min_joueur' => 'required',
                'max_joueur' => 'required',
                'min_duree' => 'required',
                'max_duree' => 'required',
                'image' => 'required',
            ]
        );

        // code exécuté uniquement si les données sont validaées
        // sinon un message d'erreur est renvoyé vers l'utilisateur

        // préparation de l'enregistrement à stocker dans la base de données
        $jeu = new Jeu;

        $jeu->nom = $request->nom;
        $jeu->categorie = $request->categorie;
        $jeu->sortie = $request->sortie;
        $jeu->description = $request->description;
        $jeu->age_min = $request->age_min;
        $jeu->min_joueur = $request->min_joueur;
        $jeu->max_joueur = $request->max_joueur;
        $jeu->min_duree = $request->min_duree;
        $jeu->max_duree = $request->max_duree;
        $jeu->image = $request->image;

        // insertion de l'enregistrement dans la base de données
        $jeu->save();

        // redirection vers la page qui affiche la liste des tâches
        return redirect('/jeux');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $action = $request->query('action', 'show');
        $jeu = Jeu::find($id);
        /*if ($jeu->id-1 > 0)
            $precedent = $jeu->id-1;
        if ($jeu->id+1 != null)
            $suivant = $jeu->id+1;*/

        return view('jeux.show', ['jeu' => $jeu, 'action' => $action]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jeu = Jeu::find($id);
        return view('jeux.edit', ['jeu' => $jeu]);

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
        $jeu = Jeu::find($id);

        $this->validate(
            $request,
            [
                'nom' => 'required',
                'categorie' => 'required',
                'sortie' => 'required',
                'description' => 'required',
                'age_min' => 'required',
                'min_joueur' => 'required',
                'max_joueur' => 'required',
                'min_duree' => 'required',
                'max_duree' => 'required',
                'image' => 'required',
            ]
        );

        // code exécuté uniquement si les données sont validaées
        // sinon un message d'erreur est renvoyé vers l'utilisateur

        // préparation de l'enregistrement à stocker dans la base de données

        $jeu->nom = $request->nom;
        $jeu->categorie = $request->categorie;
        $jeu->sortie = $request->sortie;
        $jeu->description = $request->description;
        $jeu->age_min = $request->age_min;
        $jeu->min_joueur = $request->min_joueur;
        $jeu->max_joueur = $request->max_joueur;
        $jeu->min_duree = $request->min_duree;
        $jeu->max_duree = $request->max_duree;
        $jeu->image = $request->image;

        // insertion de l'enregistrement dans la base de données
        $jeu->save();

        return redirect('/jeux');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->delete == 'valide') {
            $jeu = Jeu::find($id);
            $jeu->delete();
        }
        return redirect()->route('jeux.index');
    }
}
