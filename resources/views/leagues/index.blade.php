
@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="uper">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h1 class="mb-5">Bienvenue sur le portail des Leagues MS5</h1>
            <div class="row">
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="http://placekitten.com/200/200" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Rejoindre une league privée</h5>
                            <p class="card-text">Défies tes potes dans un championnat uniquement entre vous.</p>
                            <form method="post" role="form" action="{{ route('leagues.joinPrivateLeague') }}">
                            @csrf
                                <div class="form-group">
                                    <label for="token">Mot de passe de la league :</label>
                                    <input type="text" class="form-control" name="token" required/>
                                </div>
                                <button type="submit" class="btn btn-primary">Rejoindre</button>
                            </form>
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
                            <form method="post" role="form" action="{{ route('leagues.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nom de la league :</label>
                                    <input type="text" class="form-control" name="name" required/>
                                </div>
                                <div class="form-group">
                                    <label for="number_teams">Nombre d'équipes :</label>
                                    <select class="form-control" id="number_teams" name="number_teams" required>
                                        <option>choisir un nombre d'équipes !</option>
                                        <option value="2">2 équipes</option>
                                        <option value="4">4 équipes</option>
                                        <option value="6">6 équipes</option>
                                        <option value="8">8 équipes</option>
                                        <option value="10">10 équipes</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="public">Statut de la league :</label>
                                    <select class="form-control" id="public" name="public" required>
                                        <option>choisir un statut !</option>
                                        <option value="0">publique</option>
                                        <option value="1">privée</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Créer une league</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

