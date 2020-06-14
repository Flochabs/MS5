@extends('layouts.home')

@section('content')

    <div class="container-fluid p-0">
        <div class="row no-gutters">
            <div class="col-md-6 text-right">
                <img src="{{asset('storage/images/image_tutos.jpg')}}" alt="photo">
            </div>
            <div class="col-md-6 pl-5 pt-5">
                <h4 class="tertiary p-2">Les tutos de M. MVP</h4>
                <h1 class="pl-2 text-white">D'ACCORD, <br> MAIS ÇA FONCTIONNE COMMENT ?</h1>
                <h4 class="tertiary p-2">° Découvrez les règles en 5 minutes chrono</h4>
                <p class="pl-2 text-white">Explication de l'application, texte à définir.</p>
                <p class="tertiary p-2">Lire la suite</p>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-light pt-3">

        <div class="row no-gutters">

            <div class="col-md-12 text-center pt-5">
                <h2>Créez votre ligue, invitez vos potes <b>et marchez leur dessus !</b></h2>
            </div>

        </div>

        <div class="container">

            <hr>

            <div class="row no-gutters">

                <div class="col-md-3 text-center p-3">
                    <img src="{{asset('storage/images/picto_joueur.png')}}" alt="joueur">
                    <h5 class="py-2"><b>+ de <span class="tertiary">5000</span> joueurs MS5</b></h5>
                    <p>Du texte à définir ! Du texte à définir ! Du texte à définir ! Du texte à définir ! Du texte à
                        définir !
                        Du texte à définir ! Du texte à définir ! Du texte à définir ! Du texte à définir ! Du texte à
                        définir !</p>
                </div>
                <div class="col-md-3 text-center p-3">
                    <img src="{{asset('storage/images/picto_league.png')}}" alt="panier">
                    <h5 class="py-2"><b><span class="tertiary">125</span> ligues crées</b></h5>
                    <p>Du texte à définir ! Du texte à définir ! Du texte à définir ! Du texte à définir ! Du texte à
                        définir !
                        Du texte à définir ! Du texte à définir ! Du texte à définir ! Du texte à définir ! Du texte à
                        définir !</p>
                </div>
                <div class="col-md-3 text-center p-3">
                    <img src="{{asset('storage/images/picto_teams.png')}}" alt="maillot">
                    <h5 class="py-2"><b><span class="tertiary">800</span> équipes crées</b></h5>
                    <p>Du texte à définir ! Du texte à définir ! Du texte à définir ! Du texte à définir ! Du texte à
                        définir !
                        Du texte à définir ! Du texte à définir ! Du texte à définir ! Du texte à définir ! Du texte à
                        définir !</p>
                </div>
                <div class="col-md-3 text-center p-3">
                    <img style="height: 75px; width: 75px;" src="{{asset('storage/images/terrain.jpeg')}}"
                         alt="terrain">
                    <h5 class="py-2"><b><span class="tertiary">10 000</span> matchs joués</b></h5>
                    <p>Du texte à définir ! Du texte à définir ! Du texte à définir ! Du texte à définir ! Du texte à
                        définir !
                        Du texte à définir ! Du texte à définir ! Du texte à définir ! Du texte à définir ! Du texte à
                        définir !</p>
                </div>

            </div>
            <div class="row no-gutters justify-content-center p-5">
                <button class="bouton-inscription">Rejoins-nous</button>
            </div>

        </div>

    </div>

    <div class="container bg-crown">

        <div class="row no-gutters text-center">
            <div class="col-12 p-5 text-center">
                <h1 class="text-white">Hall Of Fame</h1>
            </div>
        </div>

        <div class="row no-gutters justify-content-center">

            <div class="col-md-4">
                <div class="row justify-content-center">
                    <div class="pr-2">
                        <img class="imageHOF" src="https://placehold.it/100/100" alt="">
                    </div>
                    <div>
                        <h4 class="text-white">KillerChouquette23</h4>
                        <h6 class="text-white">Les viennoiseries vener</h6>
                        <p class="tertiary">Meilleur Ratio victoire/défaite</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="row justify-content-center">
                    <div class="pr-2 ">
                        <img class="imageHOF" src="https://placehold.it/100/100" alt="">
                    </div>
                    <div>
                        <h4 class="text-white">Michel Jourdan</h4>
                        <h6 class="text-white">Chicago Moulles</h6>
                        <p class="tertiary">Meilleure attaque</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="row justify-content-center">
                    <div class="pr-2">
                        <img class="imageHOF" src="https://placehold.it/100/100" alt="">
                    </div>
                    <div>
                        <h4 class="text-white">Larry Beurk</h4>
                        <h6 class="text-white">Les Poireaux Muttants</h6>
                        <p class="tertiary">Meilleure défense</p>
                    </div>
                </div>
            </div>

        </div>

        <div class="row no-gutters py-4 justify-content-center">

            <div class="col-md-6">
                <div class="row justify-content-center">
                    <div class="pr-2">
                        <img class="imageHOF" src="https://placehold.it/100/100" alt="">
                    </div>
                    <div>
                        <h4 class="text-white">Charlote l'abeille</h4>
                        <h6 class="text-white">Flylikelebron</h6>
                        <p class="tertiary">Nombre de rebonds gagnés</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row justify-content-center">
                    <div class="pr-2">
                        <img class="imageHOF" src="https://placehold.it/100/100" alt="">
                    </div>
                    <div>
                        <h4 class="text-white">Naheu</h4>
                        <h6 class="text-white">TeamToShop</h6>
                        <p class="tertiary">Médaille en chocolat</p>
                    </div>
                </div>
            </div>

        </div>

        <div class="row no-gutters justify-content-center pb-4">
            <span>
                <button class="bouton-connexion">Voir le Hall Of Fame</button>
            </span>

        </div>
    </div>

    <div class="container-fluid bg-jersey tutoimg ">
        <div class="row h-100 align-items-md-center">
            <div class="col-md-6 offset-md-6">
                <p class="quaternary py-2">Les Tuto de Mr.MVP</p>
                <h1 class="text-white py-2">Créer une équipe équilibrée</h1>
                <p class="text-white py-2 overflow-auto w-50">Texte à définir ! Texte à définir !Texte à définir !
                    Texte à définir !Texte à définir !Texte à définir ! Texte à définir ! Texte à définir ! Texte à
                    définir !
                    Texte à définir ! Texte à définir ! Texte à définir ! Texte à définir ! Texte à définir ! Texte à
                    définir !
                    Texte à définir ! Texte à définir !</p>
                <button class="bouton-inscription my-4">Lire l'article complet</button>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <a class="twitter-timeline" data-width="500" data-height="700" data-theme="dark"
                   href="https://twitter.com/home?ref_src=twsrc%5Etfw">Tweets by home</a>
            </div>
        </div>
    </div>


@endsection
