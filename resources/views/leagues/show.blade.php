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
            <div class="col-md-6 text-left"><h2 class="mb-3 text-white">{{$league->number_teams - $league->users->count()}} place(s) restante(s) sur {{$league->number_teams}}</h2></div>
            @if(Auth::user()->id === $league->user->id)
            <div class="col-md-6 text-right">
                <div class="row">
                    @if($league->isActive === 0)
                    <form action="{{ route('leagues.update', $league->id)}}" method="post">
                        @csrf
                        @method('PATCH')
                        <input type="text" class="d-none form-control" name="isActive" value="1"/>
                        <button class="bouton-inscription" type="submit">Lancer la league</button>
                    </form>
                    @endif
                    <form action="{{ route('leagues.destroy', $league->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="bouton-connexion" type="submit">Supprimer la league</button>
                    </form>
                </div>

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
                @foreach($league->users as $team)
                    <tr>
                        <td>{{$team->pseudo}}</td>
                        <td>
                            @if($league->isActive === 1)
                            @else
                                <a href="{{ route('teams.create')}}" class="btn btn-outline-secondary">Créér une équipe</a>
                            @endif
                        </td>
                        <td>
                            @if($league->isActive === 1)
                            @else
                                En attente de la draft
                            @endif
                        </td>
                        <td>
                            @if($league->isActive === 1)
                            @else
                                En attente de la draft
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection


