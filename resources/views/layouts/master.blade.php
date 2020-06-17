<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('css')
    <title>MS5</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @yield('scripts-header')
</head>
<body>
<header class="container pt-3">
    <div class="row">
        <div class="col-md-4">
            <a href="{{ route('dashboard.index') }}">
                <img class="img-fluid" width="50%" src="{{asset('storage/images/Logo.png')}}" alt="logo">
            </a>
        </div>

        <div class="col-md-8">
            <div class="row align-items-center">
                <div class="bouton-connexion">
                    <a href="{{ route('nba.index')}}"><p>NBA</p></a>
                </div>

                <div class="bouton-connexion ml-2">
                    <a href="{{ route('leagues.index')}}"><p>Leagues</p></a>
                </div>

                <div class="bouton-connexion ml-2">
                    <a href="{{ route('dashboard.index') }}"><p>Tableau de bord</p></a>
                </div>

                <div class="bouton-connexion ml-2">
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        {{ __('Déconnexion') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>


<div id="id">
    @yield('content')
</div>
<footer>
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-4 p-1">
                <p class="tertiary">LE SITE</p>
                <p><a class="text-white" href="#">A propos de nous</a></p>
                <p><a class="text-white" href="#">Contact</a></p>
                <p><a class="text-white" href="#">Mention Légale</a></p>
                <p><a class="text-white" href="#"></a></p>
            </div>

            <div class="col-md-4 p-1">
                <p class="tertiary">RESSOURCES</p>
                <p><a class="text-white" href="#">Centre d'aide</a></p>
                <p><a class="text-white" href="#">Notre blog</a></p>
                <p><a class="text-white" href="#">Histoire de clients</a></p>
                <p><a class="text-white" href="#">Notre PayPal</a></p>
            </div>

            <div class="col-md-4 p-1">
                <img class="logo-footer" src="{{asset('storage/images/logo_footer.png')}}" alt="logo">
            </div>
        </div>
        <div class="container-fluid py-4">
            <hr class="white">
        </div>

    </div>

</footer>
<script src="{{ asset('js/app.js') }}" type="text/js"></script>
@yield('script-footer')
</body>
</html>
