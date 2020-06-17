@extends('layouts.master');

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="text-white">Contact</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <form class="w-50" method="POST" action="{{ route('contact') }}">

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

                <div class="form-group">
                    <label for="message">Example textarea</label>
                    <textarea class="form-control" id="message" rows="3"></textarea>
                </div>

                <div class="form-group pb-connexion">
                    <div class="row justify-content-center pb-1">

                        <button type="submit" class="bouton-connexion m-2 w-50">
                            {{ __('Envoyer') }}
                        </button>

                    </div>
                </div>
            </form>
        </div>
    </div>

    @endsection
