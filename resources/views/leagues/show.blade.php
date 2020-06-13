
@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="uper">
            <h1 class="my-5 text-white">Bienvenue sur le portail des Leagues publiques</h1>
            <h2 class="mb-5 text-white">Ici, pas de fairplay, que de l'humour !</h2>
            <div class="row">
                <div class="col-12">
                    <table class="table table-striped text-white">
                        <thead class="font-weight-bold">
                        <tr>
                            <td class="tertiary">Nom de la league</td>
                            <td class="tertiary">Créateur de la league</td>
                            <td class="tertiary">Places restantes</td>
                            <td class="tertiary">Rejoindre</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($leagues as $league)
                            <tr>
                                <td>{{$league->name}}</td>
                                <td>{{$league->user->pseudo}}</td>
                                <td>{{$league->number_teams - $league->users->count()}}</td>
                                @if($league->number_teams <= $league->users->count())
                                    <td>Complet</td>
                                @else
                                    <td><a href="#" class="btn btn-secondary">Rejoindre</a></td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $leagues->links() }}
                </div>
            </div>
        </div>
@endsection


