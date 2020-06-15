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
<nav class="navbar navbar-expand-lg navbar-light bg-secondary">
    <a class="navbar-brand" href="{{ route('dashboard.index') }}">
        <img class="img-fluid" width="10%" src="{{asset('storage/images/Logo.png')}}" alt="logo">
    </a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="text-white nav-link" href="{{ route('nba.index')}}">NBA</a>
            </li>
            <li class="nav-item active">
                <a class="text-white nav-link" href="{{ route('leagues.index')}}">Leagues</a>
            </li>
            <li class="nav-item active">
                <a class="text-white nav-link" href="{{ route('dashboard.index') }}">Tableau de bord</a>
            </li>
            <li class="nav-item active">
                <a class="text-white nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                    {{ __('Se déconnecter') }}
                    </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</nav>


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
</body>
</html>
