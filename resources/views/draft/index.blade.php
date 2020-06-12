@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
{{-----------------------FILTRES TABLEAU JOUEURS NBA ---------------------}}
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
                        <form action="" class="form-group">
                        <input type="search">
                        <submit>Rechercher</submit>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-white">

{{-----------------------TABLEAU JOUEURS NBA ---------------------}}
                        <table class="table text-white table-condensed table-striped" style="width: 100%;">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Joueur</th>
                                <th scope="col">Equipe</th>
                                <th scope="col">Poste</th>
                                <th scope="col">Min</th>
                                <th scope="col">Pts</th>
                                <th scope="col">Passes D</th>
                                <th scope="col">Reb</th>
                                <th scope="col">Blk</th>
                                <th scope="col">Int</th>
                                <th scope="col">PdB</th>
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
                                    <td>
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
                                    <td>
                                        <form action="{{ route('draft.auction', ['id' => $player->id])}}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-success">faire une offre</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{--                {{$players->links()}}--}}
                    </div>
                </div>
            </div>

            <div class="col-md-4">
{{-----------------------DONNEES SUR SALARY CAP ---------------------}}
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
                                <p>faire le calcul du tarif des joueurs draftés</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p>Coût Total des Enchères en cours</p>
                            </div>
                            <div class="col-md-6">
                                <p>{{$auctions->sum("auction")}}</p>
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
{{-----------------------ENCHERES EN COURS ---------------------}}
                <div class="row">
                    <div class="col-md-12 text-white">
                        <h2>Mes Enchères En cours</h2>
                        <table class="text-white">
                            @foreach($auctions as $auction)
                            <tr>
                                <td>{{$auction->player_id}}</td>
                                <td>{{$auction->auction}}</td>
                                <td>{{$auction->auction}}</td>
                                <td>
                                    <form action="{{ route('draft.delete.auction', ['id' => $auction->player_id])}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-secondary rounded-circle">X</button>
                                </form>
                                <td>Réenchérir</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
{{-----------------------JOUEURS DRAFTES ---------------------}}
                <div class="row">
                    <div class="col-md-12 text-white">
                        <h2>Mes Joueurs Draftés</h2>
                        <p>Arrières</p>
                        <p>Minium 4</p>
                        <table class="text-white">
                            @if(isset($guards))
                            @foreach($guards as $guard)
                                <@php
                                    $PlayerInfos = json_decode($player->data);
                                @endphp
                                <tr>
                                    {{--                                    <td>{{$draftedPlayer->id}}</td>--}}
                                    <td>{{$PlayerInfos->pl->ln}}</td>
                                    <td>{{$PlayerInfos->pl->fn}}</td>
                                    <td>{{$PlayerInfos->pl->pos}}</td>
                                </tr>
                            @endforeach
                            @endif
                        </table>

                        <p>Ailiers</p>
                        <p>Minium 4</p>
                        <table class="text-white">
                            @if(isset($forwards))
                            @foreach($forwards as $player)
                                @php
                                    $PlayerInfos = json_decode($player->data);
                                @endphp
                                    <tr>
                                        {{--                                    <td>{{$draftedPlayer->id}}</td>--}}
                                        <td>{{$PlayerInfos->pl->ln}}</td>
                                        <td>{{$PlayerInfos->pl->fn}}</td>
                                        <td>{{$PlayerInfos->pl->pos}}</td>
                                    </tr>
                            @endforeach
                            @endif
                        </table>

                        <p>Centres</p>
                        <p>Minium 3</p>
                        <table class="text-white">
                            @if(isset($centers))
                            @foreach($centers as $player)
                                @php
                                    $PlayerInfos = json_decode($player->data);
                                @endphp
                                <tr>
                                    {{--                                    <td>{{$draftedPlayer->id}}</td>--}}
                                    <td>{{$PlayerInfos->pl->ln}}</td>
                                    <td>{{$PlayerInfos->pl->fn}}</td>
                                    <td>{{$PlayerInfos->pl->pos}}</td>
                                </tr>
                            @endforeach
                            @endif
                        </table>
                    </div>
                </div>
                <div class="row">
                    <button class="btn btn-secondary">Valider Draft</button>
                </div>
            </div>
        </div>
    </div>
        @endsection
        <script type="text/javascript">


        </script>
