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
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('dashboard.index') }}">
        <img class="img-fluid" width="10%" src="{{asset('storage/images/Logo.png')}}" alt="logo">
    </a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('nba.index')}}">NBA</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('leagues.index')}}">Leagues</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('dashboard.index') }}">Tableau de bord</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('logout') }}"
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
<script src="{{ asset('js/app.js') }}" type="text/js"></script>
@yield('scripts-footer')
</body>
</html>
