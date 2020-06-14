@extends('layouts.master')

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <br/>
        @endif
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br/>
        @endif
        <h1 class="my-5 text-white">Récapitulatif de la league {{ $league->name }}</h1>
        <div class="row mb-3">
            <div class="col-md-6 text-left"><h2 class="mb-3 text-white">{{$league->number_teams - $league->users->count()}} places restantes sur {{$league->number_teams}}</h2></div>
{{--            {{dd(Auth::user()->id)}}--}}
{{--            {{dd($league->user->id)}}--}}
            @if(Auth::user()->id === $league->user->id)
            <div class="col-md-6 text-right">
                <button class="bouton-inscription">Lancer la league</button>
                <button class="bouton-connexion">Supprimer la league</button>
            </div>
            @endif
        </div>


        <div class="row">
            <table class="table table-striped text-white">
                <thead class="font-weight-bold">
                <tr>
                    <th class="tertiary">Participant</th>
                    <th class="tertiary">Nom d'équipe</th>
                    <th class="tertiary">Classement</th>
                    <th class="tertiary">% de victoires</th>
                </tr>
                </thead>
                <tbody>
{{--                {{dd($league->users)}}--}}
                @foreach($league->users as $team)
                    <tr>
                        <td>{{$team->pseudo}}</td>
                        <td>blablabla</td>
                        <td>blablabla</td>
                        <td>blablabla</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection


