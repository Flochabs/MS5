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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


</head>
<body>

<div id="app">

    <header class="container-fluid p-0">
        <div class="row no-gutters">
            <div class="col-md-12">
                <div class="banner justify-content-center">
                    <div class="container">
                        <div class="row no-gutters justify-content-end pt-5">
                            <i class="fab fa-instagram fa-2x icon text-center pt-1 m-2"></i>
                            <i class="fab fa-facebook fa-2x icon text-center pt-1 m-2"></i>
                            <i class="fab fa-twitter fa-2x icon text-center pt-1 m-2"></i>
                        </div>
                        <div class="row no-gutters justify-content-center pt-4">
                            <div class="col-md-12">
                                <img class="img-fluid mt-5" src="{{asset('storage/images/Logo.png')}}" alt="logo">
                            </div>
                        </div>
                        <div class="row no-gutters justify-content-center p-5">
                            <li class="nav-item">
                                <a class="bouton-connexion"
                                   href="{{ route('login') }}">{{ __('Connexion') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="bouton-inscription"
                                       href="{{ route('register') }}">{{ __('Inscription') }}</a>
                                </li>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

<main class="">
    @yield('content')
</main>
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

</div>
</body>
</html>
