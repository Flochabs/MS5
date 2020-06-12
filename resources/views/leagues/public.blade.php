
@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="uper">
            <h1 class="mb-5">Bienvenue sur le portail des Leagues publiques</h1>
            <h2 class="mb-5">Ici, pas de fairplay, que de l'humour !</h2>
            <div class="row">
                <div class="col-12">
                    <table class="table table-striped text-white">
                        <thead class="font-weight-bold">
                        <tr>
                            <td>Nom de la league</td>
{{--                            <td>Créateur de la league</td>--}}
                            <td>Places restantes</td>

                            <td>Rejoindre</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($leagues as $league)
                            <tr>
                                <td>{{$league->name}}</td>
{{--                                <td>{{$league->user->pseudo}}</td>--}}
                                <td>{{$league->pivot->user_id->count}}</td>
                                <td><a href="#" class="btn btn-primary">Rejoindre</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $leagues->links() }}
                </div>
            </div>
    </div>
@endsection


