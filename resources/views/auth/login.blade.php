@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="container">
                    <div class="row justify-content-center">

                        <div class="col-md-12 pt-3">
                            <h2 class="text-center text-white">Connexion</h2>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <form class="w-50" method="POST" action="{{ route('login') }}">
                                @csrf

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

                                {{--Remember--}}
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                   name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Se souvenir de moi') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                {{--Boutton et MDP oublié--}}
                                <div class="form-group">
                                    <div class="row justify-content-center">

                                        <button type="submit" class="bouton-connexion m-2 w-50">
                                            {{ __('Connexion') }}
                                        </button>

                                    </div>
                                    <div class="row justify-content-center">
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                <p>Mot de passe oublié ?</p>
                                            </a>
                                        @endif

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
