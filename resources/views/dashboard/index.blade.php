@extends('layouts.master')

@section('content')
    <div class="container">
        <!-- Première sections -->
        <div class="row">
                <!-- CARD Profil -->
                <div class="col-md-6 d-flex justify-content-center pt-3">
                    <div class="MS5card card" style="width: 18rem; height: 15rem">
                        <div class="card-body">
                            <h5 class="card-title text-center">Profil</h5>
                            <div>
                                <img src="https://via.placeholder.com/90" alt="">
                            </div>
                            <div>
                                <h3 class="card-subtitle mb-2 text-white">{{Auth::user()->pseudo}}</h3>
                            </div>
                            <div class="card-header col-md-12 d-flex justify-content-center pb-2">
                                <a class="btn btn-primary text-white" href="{{ route('dashboard.profile', $user_id) }}">
                                    Profil
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CARD League -->
                <div class="col-md-6 d-flex justify-content-center pt-3">
                    <div class="MS5card card">
                        <div class="banner-league-publique">
                            <h5 class="card-title text-center">League</h5>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead class="text-white">
                                <tr>
                                    <th class="text-center" scope="col">Classement</th>
                                    <th class="text-center" scope="col">Équipe</th>
                                    <th class="text-center" scope="col">Stade</th>
                                    <th class="text-center" scope="col">Score</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th class="text-center text-white" scope="row">1</th>
                                    <th class="text-center text-white" scope="row">TheBoss</th>
                                    <td class="text-center text-white">New Orleans Arena</td>
                                    <td class="text-center text-white">10</td>
                                </tr>
                                <tr>
                                    <th class="text-center text-white" scope="row">2</th>
                                    <th class="text-center text-white" scope="row">Puma</th>
                                    <td class="text-center text-white">United Center</td>
                                    <td class="text-center text-white">6</td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="card-header col-md-12 d-flex justify-content-center pb-2">
                                <a href="#" class="btn btn-secondary">League</a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <!-- Deuxième sections -->
        <div class="row">

                 <!-- CARD Equipe -->
                <div class="col-md-6 d-flex justify-content-center pt-3">
                    <div class="MS5card card" >
                        <div class="card-body">
                            <h5 class="card-title text-center">Equipe</h5>
                            <table class="table">
                                <thead class="text-white">
                                    <tr>
                                        <th class="text-center" scope="col">Joueur</th>
                                        <th class="text-center" scope="col">Position</th>
                                        <th class="text-center" scope="col">Score</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th class="text-center text-white" scope="row">Steven Adams</th>
                                        <td class="text-center text-white">ailier</td>
                                        <td class="text-center text-white">11</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="card-header col-md-12 d-flex justify-content-center pb-2">
                                <a href="#" class="btn btn-secondary">Equipe</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CARD Resultat du dernier match -->
                <div class="col-md-6 d-flex justify-content-center pt-3">
                    <div class="MS5card card">
                        <div class="row">
                            <div class="banner-match-result">
                                <h5 class="card-title text-center">Résultat du dernier match</h5>
                            </div>
                            <div class="card-body">
                                <div class="col-md-12 p-2">
                                    <h5 class="text-center">Nom de la league</h5>
                                </div>
                                <div class="col-md-12 d-flex justify-content-between align-items-center">
                                    <div class="col-md-4 d-flex flex-column justify-content-center pt-2">
                                        <img src="https://via.placeholder.com/90" alt="">
                                        <p class="text-center pt-3">Equipe</p>
                                    </div>
                                    <div class="col-md-4 d-flex justify-content-center">
                                        <h4>86 - 130</h4>
                                    </div>
                                    <div class="col-md-4 d-flex flex-column justify-content-center pt-2">
                                        <img src="https://via.placeholder.com/90" alt="">
                                        <p class="text-center pt-3">Equipe</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-header">
                            <h5 class="text-center">Statistiques du match</h5>
                        </div>
                        <div class="card-body col-md-12 d-flex justify-content-center">
                            <div class="col-md-4">
                                <p class="text-center">24</p>
                                <p class="text-center">30</p>
                                <p class="text-center">68</p>
                                <p class="text-center">86</p>
                            </div>
                            <div class="col-md-4">
                                <p class="text-center">1</p>
                                <p class="text-center">2</p>
                                <p class="text-center">3</p>
                                <p class="text-center">4</p>
                            </div>
                            <div class="col-md-4">
                                <p class="text-center">37</p>
                                <p class="text-center">50</p>
                                <p class="text-center">98</p>
                                <p class="text-center">130</p>
                            </div>
                        </div>
                        <div class="card-header col-md-12 d-flex justify-content-center pb-2">
                            <span>
                                <a href="{{ route('dashboard.match_result') }}" class="btn btn-secondary">Feuille de match</a>
                            </span>

                        </div>
                    </div>
                </div>


        </div>

        <!-- Troisième sections -->
        <div class="row">
            <!-- Card Prochain match -->
            <div class="col-md-6 d-flex justify-content-center pt-3">
                <div class="card-dashboard">
                    <div class="banner-next-match">
                        <h5 class="card-title text-center">Prochain match</h5>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12 d-flex justify-content-between align-items-center">
                            <div class="col-md-4 d-flex flex-column justify-content-center pt-2">
                                <img src="https://via.placeholder.com/90" alt="">
                                <p class="text-center pt-3">Equipe</p>
                            </div>
                            <div class="col-md-4 d-flex justify-content-center">
                                <h4>VS</h4>
                            </div>
                            <div class="col-md-4 d-flex flex-column justify-content-center pt-2">
                                <img src="https://via.placeholder.com/90" alt="">
                                <p class="text-center pt-3">Equipe</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-header col-md-12 d-flex justify-content-center pb-2">
                        <h5>Début du math</h5>
                    </div>
                    <div class="card-body col-md-12 d-flex flex-column justify-content-center">
                        <div class="col-md-12 text-center">
                            <h4>14 : 00 : 59 : 27</h4>
                        </div>
                        <div class="col-md-12 d-flex">
                            <p class="m-3">Jours</p>
                            <p class="m-3">Heures</p>
                            <p class="m-3">mins</p>
                            <p class="m-3">Secs</p>
                        </div>
                    </div>
                    <div class="card-header col-md-12 d-flex justify-content-center pb-2">
                        <a class="btn btn-secondary text-white" href="#">
                            Préparation de l'équipe
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card Draft -->
            <div class="col-md-6 d-flex justify-content-center pt-3">
                <div class="MS5card card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <h5 class="card-title text-center">Draft</h5>
                        </div>
                    </div>
                    <div class="card-header col-md-12 d-flex justify-content-center pb-2">
                        <h5>Draft en cours</h5>
                    </div>
                    <div class="card-header col-md-12 d-flex justify-content-center pb-2">
                        <a href="{{ route('draft.index') }}" class="btn btn-secondary">Début du draft</a>
                    </div>
                </div>
            </div>

        </div>


    </div>
@endsection
