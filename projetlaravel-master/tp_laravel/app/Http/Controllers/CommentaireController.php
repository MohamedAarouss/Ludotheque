<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commentaires = Commentaire::all();
        return view('commentaires.index', ['commentaires' => $commentaires]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('commentaires.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'titre' => 'required',
                'body' => 'required',
                'auteur' => 'required',
                'created_at' => 'required',
                'updated_at' => 'required'
            ]
        );

        // code exécuté uniquement si les données sont validaées
        // sinon un message d'erreur est renvoyé vers l'utilisateur

        // préparation de l'enregistrement à stocker dans la base de données
        $commentaire = new Commentaire();

        $commentaire->titre = $request->titre;
        $commentaire->body = $request->body;
        $commentaire->sortie = $request->auteur;
        $commentaire->created_at = $request->created_at;
        $commentaire->updated_at = $request->updated_at;

        // insertion de l'enregistrement dans la base de données
        $commentaire->save();

        // redirection vers la page qui affiche la liste des tâches
        return redirect('/commentaires');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $action = $request->query('action', 'show');
        $commentaire = Commentaire::find($id);

        return view('commentaire.show', ['commentaire' => $commentaire, 'action' => $action]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $commentaire = Commentaire::find($id);
        return view('commentaires.edit', ['commentaire' => $commentaire]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $commentaire = Commentaire::find($id);

        $this->validate(
            $request,
            [
                'titre' => 'required',
                'body' => 'required',
                'auteur' => 'required',
                'created_at' => 'required',
                'updated_at' => 'required'
            ]
        );

        // code exécuté uniquement si les données sont validaées
        // sinon un message d'erreur est renvoyé vers l'utilisateur

        // préparation de l'enregistrement à stocker dans la base de données

        $commentaire->titre = $request->titre;
        $commentaire->body = $request->body;
        $commentaire->sortie = $request->auteur;
        $commentaire->created_at = $request->created_at;
        $commentaire->updated_at = $request->updated_at;

        // insertion de l'enregistrement dans la base de données
        $commentaire->save();

        // redirection vers la page qui affiche la liste des tâches
        return redirect('/commentaires');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->delete == 'valide') {
            $commentaire = Commentaire::find($id);
            $commentaire->delete();
        }
        return redirect()->route('commentaires.index');
    }
}
