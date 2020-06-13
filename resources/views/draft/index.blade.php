@extends('layouts.master')
@section('content')
    @php @endphp
    <div class="container text-white">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">DRAFT</h1>
            </div>
            {{-----------------------VALIDER DRAFT ---------------------}}
        </div>
{{-----------------------INFOS SUR EQUIPE---------------------}}
        <div class="row my-5">
            <div class="col-lg-5 d-flex flex-column justify-content-between">
                <div class="d-flex justify-content-around align-items-center bg-dark">
                    <div class="h-100 col-3">
                        <img
                            src="https://nba-players.herokuapp.com/players/curry/stephen"
                            class="h-auto w-100 rounded-circle">
                    </div>
                    <div class="d-flex col-9 align-items-center justify-content-between">
                        <p class="text-center">{{$team->name}}</p>
                        <p class="text-center">{{$team->stadium_name}}</p>
                        <p class="text-center">{{$team->getLeague->name}}</p>
                        <div class="text-center">
                            <p class="text-center">nombre</p>
                            <p class="text-center">joueurs draftés</p>
                        </div>
                    </div>
                </div>
                <div class="text-center bg-dark w-100 py-4 d-flex">
                    <div class="col-md-6">
                        <p class="text-center">Fin de Draft dans 12h</p>
                    </div>
                    <div class="col-md-6 justify-content-center">
                        <button class="btn btn-secondary w-100">Terminer la draft</button>
                    </div>
                </div>
            </div>
{{-----------------------DONNEES SUR SALARY CAP ---------------------}}
            <div class="col-lg-7 bg-secondary px-0">
                <div class="bg-secondary text-center">
                    <h2 class="text-center">Mon Salary Cap</h2>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-sm table-dark w-100 mb-0">
                            <tbody>
                            <tr>
                                <th scope="row">Salary Cap Initial</th>
                                <td>110 millions</td>
                            </tr>
                            <tr>
                                <th scope="row">Salary Cap Restant</th>
                                <td>{{$team->salary_cap}} millions</td>
                            </tr>
                            <tr>
                                <th scope="row">Total des Joueurs Draftés</th>
                                <td>a calculer</td>
                            </tr>
                            <tr>
                                <th scope="row">Total des Enchères en cour</th>
                                <td>{{$auctions->sum("auction")}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Total des Enchères en cours + Drafté</th>
                                <td>Total des Enchères en cours + Drafté</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-7">
{{-----------------------FILTRES TABLEAU JOUEURS NBA ---------------------}}
                <div class="row bg-dark mx-3">
                    <div class="col-md-3 text-white my-2">
                        <p>Prix</p>
                        <div class="d-flex">
                            <a href="/draft?order=asc" class="btn btn-secondary p-1">croissant</a>
                            <a href="/draft?order=desc" class="btn btn-secondary p-1">decroissant</a>
                        </div>
                    </div>
                    <div class="col-md-3 text-white my-2">
                        <p>position</p>
                        <a href="/draft" class="btn btn-secondary p-1 w-100">tous les joueurs</a>
                        <div class="d-flex">
                            <a href="/draft?position=G" class="btn btn-secondary p-1">arrieres</a>
                            <a href="/draft?position=F" class="btn btn-secondary p-1">ailiers</a>
                            <a href="/draft?position=C" class="btn btn-secondary p-1">Pivot</a>
                        </div>
                    </div>
                    <div class="col-md-3 text-white my-2">
                        <p>cacher joueurs drafter</p>
                        <a href="/draft" class="btn btn-secondary p-1">montrer</a>
                        <a href="/draft?hide" class="btn btn-secondary p-1">cacher</a>
                    </div>
                    <div class="col-md-3 text-white my-2">
                        <p>ordre alphabétique</p>
                        <a href="/draft" class="btn btn-secondary p-1">croissant</a>
                        <a href="/draft?hide" class="btn btn-secondary p-1">décroissant</a>
                    </div>

                    <div class="text-white my-2">
                        <form action="" class="form-group">

                                <input type="search" class="form-control">

                            <button class="btn btn-primary">Rechercher</button>
                        </form>
                    </div>
                </div>
{{-----------------------TABLEAU JOUEURS NBA ---------------------}}
                <div class="row">
                    <div class="col-md-12 text-white mt-3">
                        <table class="table table-striped table-dark table-sm text-white w-100" style="font-size: 0.8rem;">
                            <thead class="thead-light">
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
                                <th scope="col">Prix</th>
                                <th scope="col"></th>

                            </tr>
                            </thead>
                            <tbody class="table-hover">
                            @foreach($players as $player)
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
                                                class="w-25 rounded-circle pr-1">{{$playerStats->fn}} {{$playerStats->ln}}
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
                                    <td class="align-middle">{{$player->price}}</td>
                                    @if(!in_array($player->id, $auctionPlayersId))
                                    <td colspan="2" class="align-middle">
                                        <form action="{{ route('draft.auction', ['id' => $player->id])}}" method="POST" class="mb-0">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-light p-0 px-1">enchérir
                                            </button>
                                        </form>
                                    </td>
                                    @else
                                        <td colspan="2" class="align-middle">
                                            Enchère en cours
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                                        {{$players->links()}}
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                {{-----------------------JOUEURS DRAFTES ---------------------}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="bg-secondary">
                            <h2 class="">Joueurs Draftés</h2>
                        </div>
                        @if(isset($guards) && !empty($guards))
                        <table class="table table-dark table-sm">
                            <thead>
                            <tr>
                                <th scope="col">Arrières</th>
                                <th>{{count($guards)}}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($guards as $guard)
                                    <@php
                                        $playerInfos = json_decode($player->data);
                                        $position  = substr($playerInfos->pl->pos, 0,1);
                                    @endphp
                                    <tr>
                                        {{--                                    <td>{{$draftedPlayer->id}}</td>--}}
                                        <td>{{$position}}</td>
                                        <td>{{$playerInfos->pl->fn}}</td>
                                        <td>{{$playerInfos->pl->ln}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                        @if(isset($forwards) && !empty($forwards))
                        <table class="table text-white">
                            <table class="table table-dark table-sm">
                                <thead>
                                <tr>
                                    <th scope="col">Ailiers</th>
                                    <th>{{count($forwards)}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($forwards as $player)
                                        @php
                                            $playerInfos = json_decode($player->data);
                                            $position  = substr($playerInfos->pl->pos, 0,1);
                                        @endphp
                                        <tr>
                                            {{--                                    <td>{{$draftedPlayer->id}}</td>--}}
                                            <td>{{$position}}</td>
                                            <td>{{$playerInfos->pl->fn}}</td>
                                            <td>{{$playerInfos->pl->ln}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @endif
                            @if(isset($centers) && !empty($centers))
                            <table class="table table-dark table-sm">
                                <thead>
                                <tr>
                                    <th scope="col">Pivots</th>
                                    <th>{{count($centers)}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($centers as $player)
                                        @php
                                            $playerInfos = json_decode($player->data);
                                            $position  = substr($playerInfos->pl->pos, 0,1);
                                        @endphp
                                        <tr>
                                            {{--                                    <td>{{$draftedPlayer->id}}</td>--}}
                                            <td>{{$position}}</td>
                                            <td>{{$playerInfos->pl->fn}}</td>
                                            <td>{{$playerInfos->pl->ln}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @endif
                    </div>
                </div>
                {{-----------------------ENCHERES EN COURS ---------------------}}
                <div class="row mt-5">
                    <div class="col-md-12 text-white">
                        <h2>Enchères En cours</h2>
                        <table class="table text-white">
                            @foreach($auctions as $auction)
                                <tr>
                                    <td>{{$auction->player_id}}</td>
                                    <td>{{$auction->auction}}</td>
                                    <td>
                                        <form action="{{ route('draft.delete.auction', ['id' => $auction->player_id])}}"
                                              method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-secondary rounded-circle">X</button>
                                        </form>
                                    <td>bouton dynamique : si enchère est la dernière : ce joueur sera a vous dans tps
                                    sinon réenchérir
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
<script type="text/javascript">


</script>
