@extends('layouts.master')

@section('content')
    <div class="container">
        <h1 class="my-5 text-white">Liste des joueurs NBA en activité</h1>
        <h2 class="mb-5 text-white">Retrouve ici toutes les infos les plus fraîches sur la NBA !</h2>
        <div class="row">
            <p class="tertiary">filtrer les résultats</p>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-striped text-white">
                    <thead class="font-weight-bold">
                    <tr>
                        <th class="tertiary">Portrait</th>
                        <th class="tertiary">Joueur</th>
                        <th class="tertiary">Franchise</th>
                        <th class="tertiary">Côte</th>
                        <th class="tertiary">Note tendance</th>
                        <th class="tertiary">Voir plus</th>
                    </tr>
                    </thead>
                    <tbody>
{{--                    @foreach($players as $player)--}}
{{--                        <tr>--}}
{{--                            <td>{{$player->name}}</td>--}}
{{--                            <td>{{$player->name}}</td>--}}
{{--                            <td>{{$player->name}}</td>--}}
{{--                            <td>{{$player->name}}</td>--}}
                                <td><a href="#" class="btn btn-secondary">Voir plus</a></td>
{{--                        </tr>--}}
{{--                    @endforeach--}}
                    </tbody>
                </table>
{{--                {{ $players->links() }}--}}
            </div>
        </div>
    </div>
@endsection

