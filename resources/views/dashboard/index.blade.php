@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">


                <div class="col-md-6 d-flex justify-content-center pt-3">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title text-center">Profil</h5>
                            <hr class="bg-white">
                            <img src="https://via.placeholder.com/90" alt="">
                            <h6 class="card-subtitle mb-2 text-muted">UserName</h6>
                            <a class="btn btn-primary text-white" href="{{ route('dashboard.profile') }}">
                                Profil
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 d-flex justify-content-center pt-3">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title text-center">League</h5>
                            <hr class="bg-white">
                            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a class="btn btn-primary text-white" href="#">
                                League
                            </a>
                        </div>
                    </div>
                </div>

        </div>
        <div class="row justify-content-around">


                <div class="col-md-6 d-flex justify-content-center pt-3">
                    <div class="card-dashboard" >
                        <div class="card-body">
                            <h5 class="card-title text-center">Equipe</h5>
                            <hr class="bg-white">
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                </tbody>
                            </table>
                            <hr class="bg-white">
                            <a class="btn btn-primary text-white" href="#">
                                Equipe
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 d-flex justify-content-center pt-3">
                    <div class="card-dashboard">
                        <div class="card-body">
                            <div class="col-md-12">
                                <h5 class="card-title text-center">Résultat du dernier match</h5>
                                <hr class="bg-white">
                            </div>
                            <div class="col-md-12 p-2">
                                <h5 class="text-center">Nom de la league</h5>
                            </div>
                            <div class="col-md-12 d-flex justify-content-between align-items-center">
                                <div class="col-md-4 d-flex flex-column justify-content-center pt-2">
                                    <img src="https://via.placeholder.com/90" alt="">
                                    <p class="text-center pt-3">Equipe</p>
                                </div>
                                <div class="col-md-4 d-flex justify-content-center">
                                    <h4>86-130</h4>
                                </div>
                                <div class="col-md-4 d-flex flex-column justify-content-center pt-2">
                                    <img src="https://via.placeholder.com/90" alt="">
                                    <p class="text-center pt-3">Equipe</p>
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
                        <div class="col-md-12 d-flex justify-content-center pb-2">
                            <a href="{{ route('dashboard.match_result') }}" class="btn btn-primary">Feuille de match</a>
                        </div>
                    </div>
                </div>


        </div>
    </div>
@endsection
