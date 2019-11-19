<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

{{--
   messages d'erreurs dans la saisie du formulaire.
--}}


@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{--
     formulaire de saisie d'une tâche
     la fonction 'route' utilise un nom de route
     'csrf_field' ajoute un champ caché qui permet de vérifier
       que le formulaire vient du serveur.
  --}}
 <div class="container">
    <form action="{{route('jeux.store')}}" method="POST">
        {!! csrf_field() !!}
        <div class="text-center" style="margin-top: 2rem">
            <h3>Création d'un jeu</h3>
            <hr class="mt-2 mb-2">
        </div>

        <div>
            {{-- le nom --}}
            <label for="nom"><strong>Nom</strong></label>
            <input type="text" class="form-control" id="nom" name="nom"
                   value="{{ old('nom') }}">
        </div>

        <div>
            {{-- la catégorie  --}}
            <label for="categorie"><strong>Catégorie</strong></label>
            <input type="text" class="form-control" id="categorie" name="categorie"
                   value="{{ old('categorie') }}">
        </div>

        <div>
            {{-- la date d'expiration  --}}
            <label for="sortie"><strong>Annee de sortie : </strong></label>
            <input type="int" name="sortie" id="sortie"
                   value="{{ old('sortie') }}">
        </div>

        <div>
            <label for="textarea-input"><strong>Description :</strong></label>
            <textarea name="description" id="description" rows="6" class="form-control"
                      placeholder="Description..">{{ old('description') }}</textarea>
        </div>

        <div>
            <label for="age_min"><strong>Age minimum</strong></label>
            <input type="int" class="form-control" id="age_min" name="age_min"
                   value="{{ old('age_min') }}">
        </div>

        <div>
            <label for="min_joueur"><strong>Joueur(s) minimum</strong></label>
            <input type="int" class="form-control" id="min_joueur" name="min_joueur"
                   value="{{ old('min_joueur') }}">
        </div>

        <div>
            <label for="max_joueur"><strong>Joueur(s) maximum</strong></label>
            <input type="int" class="form-control" id="max_joueur" name="max_joueur"
                   value="{{ old('max_joueur') }}">
        </div>

        <div>
            <label for="min_duree"><strong>Durée minimale</strong></label>
            <input type="int" class="form-control" id="min_duree" name="min_duree"
                   value="{{ old('min_duree') }}">
        </div>

        <div>
            <label for="max_duree"><strong>Durée maximale</strong></label>
            <input type="int" class="form-control" id="max_duree" name="max_duree"
                   value="{{ old('max_duree') }}">
        </div>

        <div>
            <label for="textarea-input"><strong>Image :</strong></label>
            <textarea name="image" id="image" rows="6" class="form-control"
                      placeholder="URL de l'image">{{ old('image') }}</textarea>
        </div>

        <div>
            <button class="btn btn-success" type="submit">Valider</button>
            <a href="{{route('jeux.index')}}"><button type="button" class="btn btn-dark">Retour à la liste</button></a>
        </div>

    </form>
 </div>