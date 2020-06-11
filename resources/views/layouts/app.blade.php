<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

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
    @if(Request::is('/'))
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
                                <img class="img-fluid mt-5" src="{{asset('storage/images/Logo.png')}}" alt="logo">
                            </div>
                            <div class="row no-gutters justify-content-center pt-5">
                                <button class="bouton-connexion mr-3"><p>Se connecter</p></button>
                                <button class="bouton-inscription"><p>S'inscrire</p></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </header>
    @endif

    <main class="">
        @yield('content')
    </main>
</div>
</body>
</html>
