<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @yield('css')
    <title>MS5</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @yield('scripts-header')
</head>
<body>
<div class="container">
{{--    <div id="app">--}}
{{--        <nav class="navbar navbar-expand-md bg-primary shadow-sm">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-4">--}}
{{--                    <a href="{{ route('dashboard.index') }}">--}}
{{--                        <img class="img-fluid" width="30%" src="{{asset('storage/images/Logo.png')}}" alt="logo">--}}
{{--                    </a>--}}
{{--                </div>--}}

{{--                <button class="navbar-toggler" type="button" data-toggle="collapse"--}}
{{--                        data-target="#navbarSupportedContent"--}}
{{--                        aria-controls="navbarSupportedContent" aria-expanded="false"--}}
{{--                        aria-label="{{ __('Toggle navigation') }}">--}}
{{--                    <span class="navbar-toggler-icon"></span>--}}
{{--                </button>--}}

{{--                <div class="col-md-8 collapse navbar-collapse" id="navbarSupportedContent">--}}

{{--                    <!-- Right Side Of Navbar -->--}}
{{--                    <ul class="navbar-nav ml-auto">--}}
{{--                        <!-- Authentication Links -->--}}

{{--                        <li class="nav-item ">--}}
{{--                            <a class="bouton-header" href="#">Profil</a>--}}
{{--                        </li>--}}


{{--                        <li class="nav-item">--}}
{{--                            <a class="bouton-header ml-2" href="{{ route('leagues.index')}}">Leagues</a>--}}
{{--                        </li>--}}


{{--                        <li class="nav-item">--}}
{{--                            <a class="bouton-header ml-2" href="{{ route('dashboard.index') }}">Tableau de bord</a>--}}
{{--                        </li>--}}


{{--                        <li class="nav-item">--}}
{{--                            <a class="bouton-header ml-2" href="{{ route('logout') }}"--}}
{{--                               onclick="event.preventDefault();--}}
{{--                       document.getElementById('logout-form').submit();">Déconnexion</a>--}}
{{--                            <form class="m-0" id="logout-form" action="{{ route('logout') }}" method="POST">--}}
{{--                                @csrf--}}
{{--                            </form>--}}
{{--                        </li>--}}


{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}


{{--        </nav>--}}
{{--    </div>--}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand w-50" href="{{ route('dashboard.index') }}">
            <img class="img-fluid" width="40%" src="{{asset('storage/images/Logo.png')}}" alt="logo"></a>
        <button class="navbar-toggler dropdown" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link bouton-header active" href="{{ route('dashboard.profile', Auth::user()->id)}}">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bouton-header active" href="{{ route('leagues.index')}}">Leagues</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bouton-header active" href="{{ route('dashboard.index') }}">Tableau de bord</a>

                </li>
                <li class="nav-item">
                    <a class="nav-link bouton-header active" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">Déconnexion</a>
                    <form class="m-0" id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    </form>
                </li>
            </ul>
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
<script src="{{ asset('js/bootstrap.js') }}" type="text/js"></script>
<script src="{{ asset('js/app.js') }}" type="text/js"></script>

@yield('script-footer')
</body>
</html>
