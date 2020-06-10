@extends('layouts.master')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="container">
        <div class="card uper">
            <div class="card-header">
                Crée ta league !
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
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
                                <select class="form-control" id="number_teams">
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
                                <select class="form-control" id="public">
                                    <option value="0">publique</option>
                                    <option value="1">privées</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 text-center d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Créer la league</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
