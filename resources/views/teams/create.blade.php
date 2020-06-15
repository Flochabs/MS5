@extends('layouts.master')

@section('content')
    <div class="container">
        <h1 class="my-5 text-white">Crée ta team :</h1>
        <div class="row justify-content-center">
            <form id="form_create_team" class="MS5card p-4 w-50" method="post" role="form" action="{{ route('teams.store') }}">
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
                                <div class="col-md-8"><input type="text" class="form-control" name="name" required/></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row my-5">
                                <div class="col-md-4">
                                    <label for="nbateam_id" class="tertiary col-form-label">{{ __('Equipe Favorite') }}</label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control input"
                                            id="nbateam_id @error('nbateam_id') is-invalid @enderror"
                                            name="nbateam_id" autocomplete="nbateam_id">

                                        <option value="">aucune</option>

                                        @foreach($nbaTeams as  $nbaTeam)
                                            <option
                                                value="{{$nbaTeam->id}}">{{$nbaTeam->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @error('nbateam_id')
                            <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                            @enderror
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="mt-3 btn btn-secondary">Créer la team</button>
                        </div>

                    </div>
                </div>

            </form>
        </div>


    </div>
@endsection
