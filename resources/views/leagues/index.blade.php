
@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="uper">
            <h1 class="mb-5">Bienvenue sur le portail des Leagues MS5</h1>
            <div class="row">
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="http://placekitten.com/200/200" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Rejoindre une league privée</h5>
                            <p class="card-text">Défies tes potes dans un championnat uniquement entre vous.</p>
                            <a href="#" class="btn btn-primary">Voir les leagues privées</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="http://placekitten.com/200/200" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Rejoindre une league publique</h5>
                            <p class="card-text">Confrontes toi à la communauté (attention aux fessées ! ^^).</p>
                            <a href="{{ route('leagues.public')}}" class="btn btn-primary">Voir les leagues publiques</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="http://placekitten.com/200/200" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Créer une league</h5>
                            <p class="card-text">Crées ta propre league, et choisis qui tu veux affronter.</p>
                            <a href="{{ route('leagues.create')}}" class="btn btn-primary">Créer une league</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

