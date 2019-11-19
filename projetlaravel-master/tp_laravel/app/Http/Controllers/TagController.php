<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index', ['tags' => $tags]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
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
                'label' => 'required',
                'created_at' => 'required',
                'updated_at' => 'required'
            ]
        );

        // code exécuté uniquement si les données sont validaées
        // sinon un message d'erreur est renvoyé vers l'utilisateur

        // préparation de l'enregistrement à stocker dans la base de données
        $tag = new Tag();

        $tag->titre = $request->titre;
        $tag->created_at = $request->created_at;
        $tag->updated_at = $request->updated_at;

        // insertion de l'enregistrement dans la base de données
        $tag->save();

        // redirection vers la page qui affiche la liste des tâches
        return redirect('/jeux');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $personne
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $action = $request->query('action', 'show');
        $tag = Tag::find($id);

        return view('tag.show', ['tag' => $tag, 'action' => $action]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $personne
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('tags.edit', ['tag' => $tag]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $personne
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tag= Tag::find($id);

        $this->validate(
            $request,
            [
                'label' => 'required',
                'created_at' => 'required',
                'updated_at' => 'required'
            ]
        );

        // code exécuté uniquement si les données sont validaées
        // sinon un message d'erreur est renvoyé vers l'utilisateur

        // préparation de l'enregistrement à stocker dans la base de données

        $tag->label = $request->label;
        $tag->created_at = $request->created_at;
        $tag->updated_at = $request->updated_at;

        // insertion de l'enregistrement dans la base de données
        $tag->save();

        // redirection vers la page qui affiche la liste des tâches
        return redirect('/commentaires');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $personne
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->delete == 'valide') {
            $tag = Tag::find($id);
            $tag->delete();
        }
        return redirect()->route('tags.index');
    }
}
