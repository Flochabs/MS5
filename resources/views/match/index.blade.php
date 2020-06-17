@extends('layouts.master')

@section('content')
    <div class="container text-white">
        {{-----------------------INFOS SUR EQUIPE---------------------}}
        <div class="row my-5">
            <div class="col-lg-3">
                <div class="col-md-12 MS5card d-flex flex-column align-items-center h-100">
                    <div class="col-6">
                        <img
                            src="https://nba-players.herokuapp.com/players/curry/stephen"
                            class="h-auto w-100 rounded-circle">
                    </div>
                    <div class="d-flex flex-column align-items-center justify-content-between">
                        <p class="text-center">{{$userTeam->name}}</p>
                        <p class="text-center">{{$userTeam->stadium_name}}</p>
                        <p class="text-center">{{$userTeam->getLeague->name}}</p>
                    </div>
                </div>
            </div>
            {{----------------------- NOMBRE JOUEURS DRAFTES ---------------------}}
            <div class="col-lg-2">
                <div class="col-md-12 MS5card h-100 d-flex justify-content-center align-items-center flex-column">
                    <p id="nb-players">{{count($userTeam->getPlayers)}}</p>
                    <p>Joueurs</p>
                    <p>Match</p>
                </div>
            </div>
            {{-----------------------DONNEES SUR LA FIN SELECTION MATCH  ---------------------}}
            <div class="col-lg-3">
                <div class="col-md-12 MS5card h-100">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <div class="h-100 col-6">
                            <p>Décompte fin de la préparation</p>
                        </div>
                        <div class="d-flex col-6 align-items-center justify-content-between">
                            <button class="btn btn-quaternary">Terminer la préparation </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="col-md-12 bg-card-title text-white mt-3">
                        <table class="table table-striped table-dark table-sm text-white w-100"
                               style="font-size: 0.8rem;">
                            <thead class="">
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
                            </tr>
                            </thead>
                            <tbody class="table-hover">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-4">
                    {{-----------------------JOUEURS SELECTIONNER ---------------------}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="bg-card-title text-center py-1 mb-3">
                                <h2 class="mb-0">Joueurs SELECTIONNER</h2>
                            </div>
                            <table class="table table-dark table-sm">
                                <thead>
                                <tr>
                                    <th scope="col" colspan="3">Arrières</th>
                                    <th>JOEUR</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="">
                                    <td width="30%">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <table class="table table-sm">
                                <thead>
                                <tr>
                                    <th scope="col" colspan="3">Ailiers</th>
                                    <th>JOEURS</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-dark table-sm">
                                <thead>
                                <tr>
                                    <th scope="col" colspan="3">Pivots</th>
                                    <th>Joueurs</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <th>Joueurs</th>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

@endsection
