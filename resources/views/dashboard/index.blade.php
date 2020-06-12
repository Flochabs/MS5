@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row d-flex">
            <div class="col-md-6 m-5">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title text-center">Profil</h5>
                        <hr class="bg-white">
                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a class="btn btn-primary text-white" href="{{ route('dashboard.profil') }}">
                            Profil
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 m-5">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title text-center">Résultat dernier match</h5>
                        <hr class="bg-white">
                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a class="btn btn-primary text-white" href="{{ route('dashboard.profil') }}">
                            Profil
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 m-5">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title text-center">League</h5>
                        <hr class="bg-white">
                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a class="btn btn-primary text-white" href="{{ route('leagues.') }}">
                            Profil
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
