<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MS5</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
        <div class="container">
            <span>
                <a href="{{ url('/') }}">
                    <img class="logo-header" src="{{asset('storage/images/logo_footer.png')}}" alt="logo">
                </a>
            </span>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item bouton-connexion">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item bouton-connexion ml-2">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Inscription') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>

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
</div>
</body>
</html>
