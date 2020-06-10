@extends('layouts.master')

@section('content')

    <div class="container">
        <H1>Crée ta league !</H1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br/>
        @endif
        <form method="post" role="form" action="{{ route('leagues.store') }}"
              class="form-horizontal" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Nom de la league :</label>
                        <input type="text" class="form-control" name="name" required/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="number_teams">Nombre d'équipes :</label>
                        <select class="form-control" id="number_teams" name="number_teams" required>
                            <option>choisir un nombre d'équipes !</option>
                            <option value="2">2 équipes</option>
                            <option value="4">4 équipes</option>
                            <option value="6">6 équipes</option>
                            <option value="8">8 équipes</option>
                            <option value="10">10 équipes</option>
                            <option value="12">12 équipes</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="public">Statut de la league :</label>
                        <select class="form-control" id="public" name="public" required>
                            <option>choisir un statut !</option>
                            <option value="0">publique</option>
                            <option value="1">privée</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 d-flex justify-content-center align-items-center">
                    <span><button type="submit" class="btn btn-primary">Créer la league</button></span>
                </div>
            </div>
        </form>
    </div>
@endsection
