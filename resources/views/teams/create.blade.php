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
        <h1 class="my-5 text-white">Crée ta team :</h1>
        <div class="row justify-content-center mb-5">
            <form id="form_create_team" class="MS5card mb-5 p-4 w-75" method="post" role="form" action="{{ route('teams.store') }}">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <div class="row my-5">
                                <div class="col-md-4"><label class="tertiary" for="name">Nom de ta team :</label></div>
                                <div class="col-md-8"><input type="text" class="form-control" name="name" required/></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row my-5">
                                <div class="col-md-4"><label class="tertiary" for="name">Nom de ton stade :</label></div>
                                <div class="col-md-8"><input type="text" class="form-control" name="stadium_name" required/></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row my-5">
                                <div class="col-md-4">
                                    <p class="tertiary">Logo de ta team :</p>
                                </div>
                                <div class="col-md-8 text-center" style="max-height: 10rem">
                                    <img class="h-100" src="{{$userLogo}}">
                                </div>
                            </div>
                            @error('nbateam_id')
                            <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                            @enderror
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-outline-secondary">Créer la team</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
