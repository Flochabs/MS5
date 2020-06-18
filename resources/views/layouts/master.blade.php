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

    <div id="app">
        <nav class="navbar navbar-expand-md bg-primary shadow-sm">
            <div class="container">
            <span>
                <a href="{{ route('dashboard.index') }}">
                <img class="img-fluid" width="30%" src="{{asset('storage/images/Logo.png')}}" alt="logo">
            </a>
            </span>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

        <div class="col-md-8">
            <div class="row align-items-center">
                <div class="bouton-connexion">
                    <a href="{{'tuto'}}"><p>Tuto</p></a>
                </div>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <a class="" href="#">
                        <li class="nav-item bouton-header">
                            <p>Profil</p>
                        </li>
                        </a>

                        <a class="bouton-header ml-2" href="{{ route('leagues.index')}}">
                        <li class="nav-item">
                            <p>Leagues</p>
                        </li>
                        </a>

                        <a class="bouton-header ml-2" href="{{ route('dashboard.index') }}">
                        <li class="nav-item">
                            <p>Tableau de bord</p>
                        </li>
                        </a>

                        <a class="bouton-header ml-2" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        <li class="nav-item">
                            <p>Déconnexion</p>
                            <form class="m-0" id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </li>
                        </a>

                    </ul>
                </div>
            </div>
        </nav>
    </div>



<div id="id">
    @yield('content')
</div>

<footer>
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-4 p-1">
                <p class="tertiary">LE SITE</p>
                <p><a class="text-white" href="#">A propos de nous</a></p>

                <p><a class="text-white" href="{{ route('contact') }}">Contact</a></p>

                <p><a class="text-white" href="{{'mentions_legales'}}">Mentions Légales</a></p>

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
