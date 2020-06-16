@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                {{--Titre formuliare--}}
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <h1 class="text-white text-center">Créez votre compte</h1>
                    </div>
                </div>

                {{--Formulaire--}}
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <form class="w-50" method="POST" action="{{ route('register') }}">
                            @csrf

                            {{--Nom--}}
                            <div class="form-group">

                                <label for="lastname"
                                       class="col-form-label">{{ __('Nom') }}</label>


                                <input id="lastname" type="text"
                                       class="form-control input @error('lastname') is-invalid @enderror "
                                       name="lastname" autocomplete="lastname">

                                @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            {{--Prénom--}}
                            <div class="form-group">

                                <label for="firstname"
                                       class="col-form-label">{{ __('Prenom') }}</label>

                                <input id="firstname" type="firstname"
                                       class="form-control input @error('firstname') is-invalid @enderror"
                                       name="firstname" autocomplete="firstname">

                                @error('firstname')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            {{--Pseudo--}}
                            <div class="form-group">

                                <label for="pseudo"
                                       class="col-form-label">{{ __('Pseudo') }}</label>

                                <input id="pseudo" type="text"
                                       class="form-control input @error('pseudo') is-invalid @enderror"
                                       name="pseudo"
                                       value="{{ old('pseudo') }}" required autocomplete="pseudo"
                                       autofocus>

                                @error('pseudo')

                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            {{--Email--}}
                            <div class="form-group">

                                <label for="email"
                                       class="col-form-label">{{ __('E-Mail') }}</label>

                                <input id="email" type="email"
                                       class="form-control input @error('email') is-invalid @enderror"
                                       name="email"
                                       value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            {{--Password--}}
                            <div class="form-group">

                                <label for="password"
                                       class="col-form-label">{{ __('Mot de passe') }}</label>

                                <input id="password" type="password"
                                       class="form-control input @error('password') is-invalid @enderror"
                                       name="password" required autocomplete="password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            {{--Password confirmation--}}
                            <div class="form-group">

                                <label for="password-confirm"
                                       class="col-form-label">{{ __('Confirmation du mot de passe') }}</label>

                                <input id="password-confirm" type="password"
                                       class="form-control input"
                                       name="password_confirmation" required
                                       autocomplete="new-password">

                            </div>

                            {{--Date--}}
                            <div class="form-group">


                                <label for="birthday"
                                       class="">{{ __('Date de naissance') }}</label>

                                <input type="date" class="form-control input"
                                       id="birthday @error('birthday') is-invalid @enderror"
                                       name="birthday"
                                       autocomplete="birthday">

                            </div>

                            {{--Équipe favorite--}}
                            <div class="form-group">

                                <label for="nbateam_id"
                                       class="col-form-label">{{ __('Equipe Favorite') }}</label>

                                <select class="form-control input"
                                        id="nbateam_id @error('nbateam_id') is-invalid @enderror"
                                        name="nbateam_id" autocomplete="nbateam_id">

                                    <option value="">aucune</option>

                                    @foreach( $nbaTeams as  $nbaTeam)
                                        <option
                                            value="{{$nbaTeam->id}}">{{$nbaTeam->name }}</option>
                                    @endforeach

                                </select>

                                @error('nbateam_id')
                                <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                @enderror

                            </div>

                            {{--Bouton--}}
                            <div class="form-group d-flex justify-content-center">
                                <span>
                                    <button type="submit" class="bouton-inscription mt-3">
                                    {{ __('S\'inscrire') }}
                                </button>
                                </span>


                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
