@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-3 text-white my-2">
                        <p>Par Ordre</p>
                        <a href="/draft?order=asc" class="btn-secondary">ordre croissant</a>
                        <a href="/draft?order=desc" class="btn-secondary">ordre decroissant</a>
                    </div>
                    <div class="col-md-3 text-white my-2">
                        <p>position</p>
                        <a href="/draft" class="btn-secondary">tous les joueurs</a>
                        <a href="/draft?position=G" class="btn-secondary">arrieres</a>
                        <a href="/draft?position=F" class="btn-secondary">ailiers</a>
                        <a href="/draft?position=C" class="btn-secondary">Pivot</a>
                    </div>
                    <div class="col-md-3 text-white my-2">
                        <p>cacher joueurs drafter</p>
                        <a href="/draft" class="btn-secondary">montrer</a>
                        <a href="/draft?hide" class="btn-secondary">cacher</a>
                    </div>

                    <div class="col-md-3 text-white my-2">
                        <p>recherche</p>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-white">

                        {{--                table des joueurs a drafter--}}
                        <table class="table text-white">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Joueur</th>
                                <th scope="col">Equipe</th>
                                <th scope="col">Poste</th>
                                <th scope="col">Minutes</th>
                                <th scope="col">Points</th>
                                <th scope="col">Passes Décisives</th>
                                <th scope="col">Rebonds</th>
                                <th scope="col">Blocks</th>
                                <th scope="col">Interceptions</th>
                                <th scope="col">Pertes de Balles</th>
                                <th scope="col">Prix</th>
                                <th scope="col">Pick</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($players as $player)
                                @php
                                    $playerStats = json_decode($player->data)->pl;

                                        $currentSeasonStats = $playerStats->ca->sa;
                                        $currentSeasonStats = last($currentSeasonStats);

                                    $position  = substr($playerStats->pos, 0,1);
                                    if($position === "G") {
                                        $position = 'Guard';
                                    } else if ($position === "F") {
                                        $position = 'Ailier';
                                    } else {
                                        $position = 'Centre';
                                    }


                                @endphp

                                <tr>
                                    <td scope="row">
                                        <a href="/draft/{{$player->id}}" class="text-white">
                                            <img
                                                src="https://nba-players.herokuapp.com/players/{{$playerStats->ln}}/{{$playerStats->fn}}"
                                                class="w-25 rounded-circle">{{$playerStats->fn}} {{$playerStats->ln}}
                                        </a>
                                    </td>
                                    <td>{{$playerStats->tn}}</td>
                                    <td>{{$position}}</td>
                                    <td>{{$currentSeasonStats->min}}</td>
                                    <td>{{$currentSeasonStats->pts}}</td>
                                    <td>{{$currentSeasonStats->ast}}</td>
                                    <td>{{$currentSeasonStats->reb}}</td>
                                    <td>{{$currentSeasonStats->stl}}</td>
                                    <td>{{$currentSeasonStats->blk}}</td>
                                    <td>{{$currentSeasonStats->tov}}</td>
                                    <td>{{$player->price}}</td>
                                    <td><a href="/draft/auction/{{$player->id}}" class="btn-secondary rounded-pill">Faire une offre</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{--                {{$players->links()}}--}}
                    </div>
                </div>
            </div>
            <div class="col-md-4">

                <div class="row">
                    <div class="col-md-12 text-white">
                        <p>Mon Salary Cap</p>
                        <div class="row">
                            <div class="col-md-6">
                                <p>Salary Cap Initial</p>
                            </div>
                            <div class="col-md-6">
                               <p>110 millions</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p>Salary Cap Restant</p>
                            </div>
                            <div class="col-md-6">
                                <p>{{$team->salary_cap}} millions</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p>Coût Total des Joueurs Draftés</p>
                            </div>
                            <div class="col-md-6">
                                <p>Coût Total des Joueurs Draftés</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p>Coût Total des Enchères en cours</p>
                            </div>
                            <div class="col-md-6">
                                <p>Coût Total des Enchères en cours</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p>Coût Total des Enchères en cours + Draftés</p>
                            </div>
                            <div class="col-md-6">
                                <p>Coût Total des Enchères en cours + Drafté</p>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 text-white">
                        <h2>Mes Enchères En cours</h2>
                        <table class="text-white">
                            @foreach($auctions as $auction)
                            <tr>
                                <td>{{$auction->player_id}}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 text-white">
                        <h2>Mes Joueurs Draftés</h2>
                        <p>player_team</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
        @endsection
        <script type="text/javascript">


        </script>
