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
                        <p>Equime Home</p>
                        <p>{{$homeTeamNextMatch->name}}</p>
                    </div>
                    <div class="col-md-4 text-white">
                        <p>Equime away</p>
                        <p>{{$awayTeamNextMatch->name}}</p>
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
                    <p>Equime Home</p>
                    <p>{{$homeTeamLastMatch->name}}</p>
                </div>

                <div class="col-md-3 text-white">
                    <p> {{ $userLastMatch->home_team_score }} - {{$userLastMatch->away_team_score}}</p>
                </div>

                <div class="col-md-3 text-white">
                    <p>Equime away</p>
                    <p>{{$awayTeamLastMatch->name}}</p>
                </div>
            </div>
        </div>
    </div>




@endsection
