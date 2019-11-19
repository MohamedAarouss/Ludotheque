<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<head>
    <title>Liste des jeux</title>
</head>
<body>
{{--<div class="container">--}}
{{--    <div class="col-lg-12 pt-3 pb-3">--}}
{{--        <h2 style="padding-left: 40px">Vos jeux</h2>--}}
{{--    </div>--}}
{{--    @if(!empty($jeux))--}}
{{--        @foreach($jeux as $jeu)--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-6 mb-4">--}}
{{--                    <div class="card h-100">--}}
{{--                        <a href="jeux/{{$jeu->id}}"><img src='{{$jeu->image}}' class="card-img" alt="image"></a>--}}
{{--                        <div class="card-body">--}}
{{--                            <h5 class="card-header mb-3"><a href="jeux/{{$jeu->id}}">{{$jeu->nom}}</a></h5>--}}
{{--                            <p class="card-text">{{$jeu->description}}</p>--}}
{{--                            <p class="card-text mb-0"><small class="text-muted">Année de sortie : {{$jeu->sortie}}</small></p>--}}
{{--                            <p class="card-text mb-0"><small class="text-muted">Catégorie : {{$jeu->categorie}}</small></p>--}}
{{--                            <p class="card-text mb-0"><small class="text-muted">Âge requis : {{$jeu->age_min}} ans</small></p>--}}
{{--                            <p class="card-text mb-0"><small class="text-muted">Nombre de joueurs : {{$jeu->min_joueur}} - {{$jeu->max_joueur}}</small></p>--}}
{{--                            <p class="card-text mb-0"><small class="text-muted">Durée d'une partie en minutes : {{$jeu->min_duree}} - {{$jeu->max_duree}}</small></p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endforeach--}}
{{--    @else--}}
{{--        <h3>Aucun jeu</h3>--}}
{{--    @endif--}}
{{--    <h3><a href="{{route('jeux.create')}}">Ajouter un jeu</a></h3>--}}

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <h1 class="my-4">Vos jeux</h1>

        <div class="row">
            @if(!empty($jeux))
                @foreach($jeux as $jeu)
                    <div class="col-lg-6 mb-4">
                        <div class="card h-100">
                            <a href="jeux/{{$jeu->id}}"><img src='{{$jeu->image}}' class="card-img" alt="image"></a>
                            <div class="card-body">
                                <h5 class="card-header mb-3"><a href="jeux/{{$jeu->id}}" style="color: black">{{$jeu->nom}}</a></h5>
                                <p class="card-text">{{$jeu->description}}</p>
                                <p class="card-text mb-0"><small class="text-muted">Année de sortie : {{$jeu->sortie}}</small></p>
                                <p class="card-text mb-0"><small class="text-muted">Catégorie : {{$jeu->categorie}}</small></p>
                                <p class="card-text mb-0"><small class="text-muted">Âge requis : {{$jeu->age_min}} ans</small></p>
                                <p class="card-text mb-0"><small class="text-muted">Nombre de joueurs : {{$jeu->min_joueur}} - {{$jeu->max_joueur}}</small></p>
                                <p class="card-text mb-0"><small class="text-muted">Durée d'une partie en minutes : {{$jeu->min_duree}} - {{$jeu->max_duree}}</small></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <h3>Aucun jeu</h3>
            @endif
            <h3><a href="{{route('jeux.create')}}">Ajouter un jeu</a></h3>
        </div>
        <!-- /.row -->

</div>

</body>
</html>