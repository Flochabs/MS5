@extends('layouts.master')

@section('content')
    @php //dd($userPlayersTeam); @endphp
    <div class="container text-white" id="next-game-coaching">
        <div class="row">
            <h2>
                Prochain Match
            </h2>
        </div>
        <div class="row">
{{-----------            TABLEAU DES JOUEURS DE LEQUIPE----------------}}
            <div class="col-md-6 text-white mt-3">
                <h1>Joueurs de l'équipe</h1>
                <table class="table table-striped table-dark table-sm text-white w-100"
                       style="">
                    <thead class="">
                    <tr>
                        <th scope="col" width="35%">Joueur</th>
                        <th scope="col">Poste</th>
                        <th scope="col">Min</th>
                        <th scope="col">Pts</th>
                        <th scope="col">Pass</th>
                        <th scope="col">Reb</th>
                        <th scope="col">Blk</th>
                        <th scope="col">Int</th>
                        <th scope="col">PdB</th>
                        <th scope="col">Dernier Score</th>


                    </tr>
                    </thead>
                    <tbody class="table-hover">
                    @foreach($userPlayersTeam as $player)
                        @php
                            $playerStats = json_decode($player->data)->pl;

                                $currentSeasonStats = $playerStats->ca->sa;
                                $currentSeasonStats = last($currentSeasonStats);

                            $position  = substr($playerStats->pos, 0,1);
                            if($position === "G") {
                                $position = 'Arrière';
                            } else if ($position === "F") {
                                $position = 'Ailier';
                            } else {
                                $position = 'Pivot';
                            }
                        @endphp
                        <tr>
                            <th scope="row" class="align-middle pr-0">
                                <a href="/draft/{{$player->id}}" class="text-white">
                                    <img
                                        src="https://nba-players.herokuapp.com/players/{{$playerStats->ln}}/{{$playerStats->fn}}"
                                        class="w-25 rounded-circle pr-1">
                                    {{$playerStats->fn}} {{$playerStats->ln}}
                                </a>
                            </th>
                            <td class="align-middle">{{$position}}</td>
                            <td class="align-middle">{{$currentSeasonStats->min}}</td>
                            <td class="align-middle">{{$currentSeasonStats->pts}}</td>
                            <td class="align-middle">{{$currentSeasonStats->ast}}</td>
                            <td class="align-middle">{{$currentSeasonStats->reb}}</td>
                            <td class="align-middle">{{$currentSeasonStats->stl}}</td>
                            <td class="align-middle">{{$currentSeasonStats->blk}}</td>
                            <td class="align-middle">{{$currentSeasonStats->tov}}</td>
                            <td class="align-middle">{{$player->score}}</td>
                            <td colspan="2" class="align-middle">
                                <form class="mb-0" data-player-id="{{$player->id}}">
                                    @csrf
                                    <button type="submit" id="player" class="btn btn-outline-light p-0 px-1" value="{{$player->id}}" name="player">choisir
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
{{-----------            COMPOSITION POUR LE PROCHAIN MATCH ----------------}}
            <div class="col-md-6">
                    <div class="bg-card-title text-center py-1 mb-3">
                        <h2 class="mb-0">Composition de l'équipe</h2>
                    </div>
                <div id="errors" class="alert alert-danger d-none" role="alert">
                </div>

                <div class>
                    <table id="compo-table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                        </tr>
                        </thead>
                        <tbody id="tableBody">
                        @foreach($playersSelected as $playerSelected)
                            @php
                                $playerDatas = json_decode($playerSelected->data)->pl;

                                    $currentSeasonStats = $playerDatas->ca->sa;
                                    $currentSeasonStats = last($currentSeasonStats);

                                $position  = substr($playerDatas->pos, 0,1);
                                if($position === "G") {
                                    $position = 'Arrière';
                                } else if ($position === "F") {
                                    $position = 'Ailier';
                                } else {
                                    $position = 'Pivot';
                                }
                            @endphp

                        <tr>
                            <td width="30%">
                                <img
                                    src="https://nba-players.herokuapp.com/players/{{$playerDatas->ln}}/{{$playerDatas->fn}}"
                                    class="w-50 rounded-circle pr-1">
                            </td>
                            <td>{{$position}}</td>
                            <td>{{$playerDatas->fn}}</td>
                            <td>{{$playerDatas->ln}}</td>
                        </tr>
                        </tbody>
                        @endforeach
                    </table>

                </div>

        </div>
    </div>
@endsection
@section('script-footer')
    <script>

        // On attend le chargement du document
        document.addEventListener("DOMContentLoaded", function () {
            (function () {
                "use strict";
                let errorElement = document.querySelector('#errors');

                let table = document.querySelector('#tableBody');
                let form = document.querySelector('.form');
                const buttons = document.querySelectorAll('button');
                //ajout de l'écouteur d'évenement pour chaque bouton de la nodelist
                buttons.forEach(button => button.addEventListener('click', function (e){
                    // Au cas si le preventDefault ne marche pas (ex: IE10)
                    e.preventDefault ? e.preventDefault() : (e.returnValue = false);
                    // on récupère le token sinon erreur 419
                    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    // on récupère les valeurs
                    let player = button.value;

                    if (window.fetch) {
                        // exécuter ma requête fetch ici
                        // @link : https://developer.mozilla.org/fr/docs/Web/API/Fetch_API/Using_Fetch
                        let myInit = {
                            method: 'POST',
                            headers: {
                                "Content-Type": "application/json",
                                "Accept": "application/json, text-plain, */*",
                                "X-Requested-With": "XMLHttpRequest",
                                // Ici je redonne le token ) mon en-tête
                                // sinon j'aurai une erreur Laravel
                                "X-CSRF-TOKEN": token,
                            },
                            // dans body je transmet mes données que j'encode en JSON
                            body: JSON.stringify({
                                player: player,
                            })
                        };

                        fetch('', myInit)
                            .then(function (response) {
                                // Je vérifie que j'ai bien un retour code : 200
                                if (response.ok) {
                                    // Si c'est ok je capte la réponse
                                    // je la transforme transform en json()
                                    // puis je passe à la suite de mon script
                                    // Il est obligatoire de passer en deux then() deux étapes
                                    return response.json();
                                } else {
                                    console.log('Mauvaise réponse du réseau');
                                }
                            })
                            .then(function (data) {
                                // Une fois que j'ai passé le test je récupère les informations
                                // Je vide toujours les erreurs au chargement
                                errorElement.textContent = '';
                                if (data[0] === 'Errors') {
                                    newError(data);
                                } else {
                                    // Si je n'ai pas d'erreur je lance ma fonction
                                    newTab(data);

                                }
                            })
                            .catch(function (error) {
                                // Ici l'erreur si le fetch n'a pas pu fonctionner
                                console.log('Il y a eu un problème avec l\'opération fetch: ' + error.message);
                            });
                    } // Fin de Fetch

                    let newTab = function(data) {

                        errorElement.classList.add('d-none');
                        table.insertAdjacentHTML('beforeend',
                            '<tr>' +
                            '<th scope="row">' +  '<img src="https://nba-players.herokuapp.com/players/' + data.lastname + "/" + data.name + '"' + ' class="w-25 rounded-circle pr-1">' + '</th>' +
                            '<td>' + data.name + '</td>' +
                            '<td>' + data.lastname + '</td>' +
                            '<td>' + data.position + '</td>' +
                            '</tr>');
                    };
                    let newError = function(errors) {
                        errorElement.textContent = '';
                        errorElement.classList.remove('d-none');
                        // Je fais volontairement passer le compteur à 1
                        // Pour ne pas afficher le Errors juste les messages
                        for (let i = 1; i < errors.length; i++) {
                            errorElement.insertAdjacentHTML('beforeend', errors[i] + '<br>');
                        }
                    };
                })); // Fin de l'écouteur
        })(); // Fin de mon script
        });
    </script>
@endsection
