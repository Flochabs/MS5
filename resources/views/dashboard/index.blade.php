@extends('layouts.master')

@section('content')
        {{-------------------       BACK  ---------------------}}
    <div class="container">
        <div class="row" style="height: 500px">
            <div class="row">
                @foreach($userPlayersTeam as $player)
                    @php
                        $playerStats = json_decode($player->data)->pl;

                        $position  = substr($playerStats->pos, 0,1);
                                    if($position === "G") {
                                        $position = 'Arrière';
                                    } else if ($position === "F") {
                                        $position = 'Ailier';
                                    } else {
                                        $position = 'Pivot';
                                    }

                    @endphp
                    <p class="card-text"><span class="tertiary">
                                {{$playerStats->fn}} {{$playerStats->ln}}
                                : </span>{{$position}}</p>
                @endforeach
            </div>
        </div>
        <div class="row flex-column" style="height: 500px">
            <div class="row">
                <div class="col-md-4">
                    <h1>Prochain Match</h1>
                </div>
                @if ($homeTeamNextMatch !== 'Match fini' || $awayTeamNextMatch !== 'Match fini' )
                    <div class="col-md-4 text-white">
                        <h5>Equime Home</h5>
                        <p>{{$homeTeamNextMatch->name}}</p>
                        @if ($homeTeamNextMatch !== 'Match fini' || $awayTeamNextMatch !== 'Match fini' )
                        <h5>Nom utilisateur</h5>
                        <p>{{$userHomeNextMatch->pseudo}}</p>
                        @else
                        @endif
                    </div>
                    <div class="col-md-4 text-white">
                        <h5>Equime away</h5>
                        <p>{{$awayTeamNextMatch->name}}</p>
                        @if ($homeTeamNextMatch !== 'Match fini' || $awayTeamNextMatch !== 'Match fini' )
                        <h5>Nom utilisateur</h5>
                        <p>{{$userAwayNextMatch->pseudo}}</p>
                        @else
                        @endif
                    </div>
                    @else
                    <h1>Match fini</h1>
                @endif
            </div>

            <div class="row  ">
                <div class="col-md-3">
                    <h1>Dernier Match</h1>
                </div>
                <div class="col-md-3 text-white">
                    <h5>Equime Home</h5>
                    <p>{{$homeTeamLastMatch->name}}</p>
                    <h5>Nom utilisateur</h5>
                    <p>{{$userHomeLastMatch->pseudo}}</p>
                </div>

                <div class="col-md-3 text-white">
                    <p> {{ $userLastMatch->home_team_score }} - {{$userLastMatch->away_team_score}}</p>
                </div>

                <div class="col-md-3 text-white">
                    <h5>Equime away</h5>
                    <p>{{$awayTeamLastMatch->name}}</p>
                    <h5>Nom utilisateur</h5>
                    <p>{{$userAwayLastMatch->pseudo}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
