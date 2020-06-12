@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                {{--Titre formuliare--}}
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="text-white text-center">Créez votre compte</h1>
                        </div>
                    </div>
                </div>
                {{--Formulaire--}}
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">

                        {{--Nom--}}
                        <div class="container">
                            <div class="row">
                                <label for="lastname"
                                       class="col-md-12 col-form-label">{{ __('Nom') }}</label>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input id="lastname" type="text"
                                           class="form-control input @error('lastname') is-invalid @enderror "
                                           name="lastname" autocomplete="lastname">

                                    @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>
                        </div>

                        {{--Prénom--}}
                        <div class="container">
                            <div class="row">
                                <label for="firstname"
                                       class="col-md-12 col-form-label">{{ __('Prenom') }}</label>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input id="firstname" type="firstname"
                                           class="form-control input @error('firstname') is-invalid @enderror"
                                           name="firstname" autocomplete="firstname">

                                    @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{--Pseudo--}}
                        <div class="container">
                            <div class="row">
                                <label for="pseudo"
                                       class="col-md-12 col-form-label">{{ __('Pseudo') }}</label>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
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
                            </div>
                        </div>

                        {{--Email--}}
                        <div class="container">
                            <div class="row">
                                <label for="email"
                                       class="col-md-12 col-form-label">{{ __('E-Mail') }}</label>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
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
                            </div>
                        </div>

                        {{--Password--}}
                        <div class="container">
                            <div class="row">
                                <label for="password"
                                       class="col-md-12 col-form-label">{{ __('Mot de passe') }}</label>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input id="password" type="password"
                                           class="form-control input @error('password') is-invalid @enderror"
                                           name="password" required autocomplete="password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        {{--Password confirmation--}}
                        <div class="container">
                            <div class="row">
                                <label for="password-confirm"
                                       class="col-md-12 col-form-label">{{ __('Confirmation du mot de passe') }}</label>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input id="password-confirm" type="password"
                                           class="form-control input"
                                           name="password_confirmation" required
                                           autocomplete="new-password">
                                </div>
                            </div>

                        </div>

                        {{--Date--}}
                        <div class="container">
                            <div class="row">
                                <label for="birthday"
                                       class="col-md-12 col-form-label">{{ __('Date de naissance') }}</label>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="date" class="form-control input"
                                           id="birthday @error('birthday') is-invalid @enderror"
                                           name="birthday"
                                           autocomplete="birthday">
                                </div>
                            </div>

                        </div>

                        {{--Équipe favorite--}}
                        <div class="container" >
                            <div class="row">
                                <label for="nbateam_id"
                                       class="col-md-12 col-form-label">{{ __('Equipe Favorite') }}</label>
                            </div>
                            <div class="row">
                                <div class="col-md-12">

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
                            </div>
                        </div>

                        {{--Bouton--}}
                        <div class="container">
                            <div class="row">
                                <button type="submit" class="bouton-inscription mt-5">
                                    {{ __('S\'inscrire') }}
                                </button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
