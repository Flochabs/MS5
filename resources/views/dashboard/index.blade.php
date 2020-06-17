@extends('layouts.master')

@section('content')
        {{-------------------       BACK  ---------------------}}
    <div class="container">
        <div class="row flex-column" style="height: 500px">
            <div class="row">
                <div class="col-md-4">
                    <h1>Prochain Match</h1>
                </div>
                @if ($homeTeamNextMatch !== 'Match fini' || $awayTeamNextMatch !== 'Match fini' )
                    <div class="col-md-4 text-white">
                        <h5>Equime Home</h5>
                        <p>{{$homeTeamNextMatch->name}}</p>
                        <h5>Nom utilisateur</h5>
                        <p>{{$userHomeNextMatch->pseudo}}</p>
                    </div>
                    <div class="col-md-4 text-white">
                        <h5>Equime away</h5>
                        <p>{{$awayTeamNextMatch->name}}</p>
                        <h5>Nom utilisateur</h5>
                        <p>{{$userAwayNextMatch->pseudo}}</p>
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
