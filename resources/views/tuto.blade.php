@extends('layouts.tuto')

@section('content')
    <div class="container mb-5">
        <div class="row mt-5">
            <div class="col-md-6">
                <img src="/../storage/images/image_tutos.jpg" alt="image tuto">
            </div>
            <div class="col-md-6">
                <div class="row my-5">
                    <div class="col-12"><h1 class="text-white">Bienvenue sur <span
                                class="tertiary">My Starting Five</span> !</h1></div>
                </div>
                <div class="row">
                    <div class="col-12"><h2 class="text-white">Tu es nouveau ? Viens, on t'explique comment ça marche
                            😋</h2></div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-6"><h4 class="text-white">Si tu connais, tu peux filer direct aux leagues :</h4>
                    </div>
                    <div class="col-md-6"><a href="{{'leagues'}} " class="btn btn-secondary">Leagues</a></div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid mt-5 py-5" id="first-banner">
        <div class="container my-5 bg-white rounded" style="height: 10rem">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-dark">Tout se déroule en 4 steps :</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 d-flex justify-content-center align-items-center">
                    <img src="{{asset('storage/images/picto_league.png')}}" alt="panier">
                    <h5>Crée ou rejoins un league</h5>
                </div>
                <div class="col-md-3 d-flex justify-content-center align-items-center">
                    <img src="{{asset('storage/images/picto_teams.png')}}" alt="maillot">
                    <h5>Crée ton équipe</h5>
                </div>
                <div class="col-md-3 d-flex justify-content-center align-items-center">
                    <img src="{{asset('storage/images/picto_joueur.png')}}" alt="joueur">
                    <h5>Sélectionne tes joueurs pendant la draft</h5>
                </div>
                <div class="col-md-3 d-flex justify-content-center align-items-center">
                    <img style="height: 75px; width: 75px;" src="{{asset('storage/images/picto_matchs.png')}}"
                         alt="terrain">
                    <h5>Ecrase tes adversaires en match !</h5>
                </div>
            </div>
        </div>

        <div class="container my-5">
            <div class="row my-5">
                <div class="col-md-6" id="first-step"></div>
                <div class="col-md-6 card shadow-lg">
                    <div class="py-4 d-flex flex-column align-items-center">
                        <h1 class="display-2 text-dark">1st Step</h1>
                        <img src="{{asset('storage/images/picto_league.png')}}" alt="photo">
                        <h2>Créér ou rejoindre une league</h2>
                    </div>
                    <div class="card-body mt-1">
                        <p class="card-text mb-1">Quand tu démarres ta vie de <span class="font-weight-bold tertiary">Fiver</span>,
                            tu te retouves face un à un premier choix difficile.</p>
                        <p class="card-text mb-1">Trois choix s'offrent à toi. Tu peux :</p>
                        <p class="card-text mb-1">  A : créér ta propre league, où tu décides du nom de ta league,
                            du nombre d'équipes que tu souhaites accueillir (ce qui conditionne le nombre de matchs à jouer).
                            Tu recevras un mail de confirmation de création, dans lequel tu trouveras un mot de passe
                            à partager avec tes potes pour qu'ils rejoignent ta league.</p>
                        <p class="card-text mb-1">  B : rejoindre une league privée, créée par un de tes potes ;
                            pour ça, il faudra que le créateur de la league te partage le mot de passe pour y accéder.</p>
                        <p class="card-text mb-1">  C : rejoindre une league publique, où tout le monde peut s'inscrire.
                            Si tu cliques tu rejoindras un écran qui liste les leagues publiques.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container my-5">
            <div class="row my-5">
                <div class="col-md-6 card shadow-lg">
                    <div class="py-4 d-flex flex-column align-items-center">
                        <h1 class="display-2 text-dark">2nd Step</h1>
                        <img src="{{asset('storage/images/picto_teams.png')}}" alt="photo">
                        <h2>Créér ta team</h2>
                    </div>
                    <div class="card-body mt-1">
                        <p class="card-text mb-1">L'étape suivante consiste à créér ta propre équipe.</p>
                        <p class="card-text mb-1">Dans un premier temp, tu peux choisir le nom d'équipe qui te plaît.</p>
                        <p class="card-text mb-1">  Ensuite tu peux nommer ton stade, qui verra ton ascension vers le sommet.</p>
                        <p class="card-text mb-1">  Enfin, il ne te reste plus qu'à choisir le logo de ta franchise favorite.
                        A toi d'arborer leurs couleurs avec honneur !</p>
                    </div>
                </div>
                <div class="col-md-6" id="second-step"></div>
            </div>
        </div>
    </div>
@endsection
