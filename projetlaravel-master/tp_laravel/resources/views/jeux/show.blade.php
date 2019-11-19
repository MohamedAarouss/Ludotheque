<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<div class="text-center" style="margin-top: 2rem">
    @if($action == 'delete')
        <h3>Suppression d'un jeu</h3>
    @else
        <h3>{{$jeu->nom}}</h3>
    @endif
    <hr class="mt-2 mb-2">
</div>

<div class="container-fluid" style="font-family: Arial">
    <div>
        <p><img src="{{$jeu->image}}" width="50%"></p>
    </div>

    <div>
        {{-- la date de sortie  --}}
        <p><strong>Date de sortie : </strong>{{$jeu->sortie}}</p>
    </div>

    <div>
        {{-- la catégorie  --}}
        <p><strong>Catégorie : </strong>{{$jeu->categorie}}</p>
    </div>

    <div>
        <p><strong>Description : </strong>{{$jeu->description}}</p>
    </div>

    <div>
        <p><strong>Age requis : </strong>{{$jeu->age_min}}</p>
    </div>

    <div>
        <p><strong>Nombre de joueur(s) : </strong>{{$jeu->min_joueur}} - {{$jeu->max_joueur}}</p>
    </div>

    <div>
        <p><strong>Durée moyenne d'une partie : </strong>{{$jeu->min_duree}} - {{$jeu->max_duree}}</p>
    </div>

    @if($action == 'delete')
        <form action="{{route('jeux.destroy',$jeu->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <div class="text-center">
                <button type="submit" name="delete" value="valide">Valider</button>
                <button type="submit" name="delete" value="annule">Annuler</button>
            </div>
        </form>
    @else
        <div>
            <a href="{{route('jeux.index')}}"><button type="button" class="btn btn-dark">Retour à la liste</button></a>
            <a href="{{route('jeux.show', $jeu->id)}}?action=delete"><button type="button" class="btn btn-danger">Supprimer</button></a>
            <a href="{{route('jeux.edit', $jeu->id)}}"><button type="button" class="btn btn-warning">Editer</button></a>
        </div>
    @endif
</div>