@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center py-3">
                <h1>Profil</h1>
            </div>
        </div>
        {{--Logo & Pseudo--}}
        <div class="row MS5card">
            <div class="col-md-6 py-2 my-2 d-flex justify-content-center">
                <img class="imageHOF" src="http://placehold.it/100/100" alt="logo">
            </div>
            <div class="col-md-6 py-2 my-2 d-flex align-items-center justify-content-center">
                <h2 class="text-white">{{$user->pseudo}}</h2>
            </div>
        </div>
        <div class="row">
            {{--Formulaire--}}
            <div class="col-12 d-flex justify-content-center align-items-md-center my-3 MS5card">
                <form class="w-50" method="POST" action="{{ route('login') }}">
                    @csrf
                    {{--Pseudo--}}
                    <div class="form-group">
                        <label for="pseudo"
                               class="col-form-label">{{ __('Pseudo') }}</label>

                        <input id="pseudo" type="pseudo"
                               class="form-control input @error('pseudo') is-invalid @enderror"
                               name="pseudo"
                               value="{{ old('pseudo') }}" required autocomplete="pseudo"
                               placeholder="{{$user->pseudo}}">

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
                               value="{{ old('email') }}" required autocomplete="email"
                               placeholder="{{$user->email}}">

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

                    {{--Boutton et MDP oublié--}}
                    <div class="form-group">
                        <div class="row justify-content-center">
                            <button type="submit" class="bouton-connexion m-2 w-50">
                                {{ __('Sauvegarder') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
