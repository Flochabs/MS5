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
<div id="app">

    <nav class="container navbar navbar-expand-md bg-primary shadow-sm">
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('dashboard.index') }}">
                    <img class="img-fluid" width="50%" src="{{asset('storage/images/Logo.png')}}" alt="logo">
                </a>
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="col-md-8 collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->

                    <li class="nav-item ">
                        <a class="nav-link bouton-header"
                           href="{{ route('dashboard.profile', Auth::user()->id)}}">{{ __('Profil') }}</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link bouton-header" href="{{ route('leagues.index')}}">Leagues</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link bouton-header" href="{{ route('dashboard.index') }}">Tableau de bord</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link bouton-header" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">Déconnexion</a>
                        <form class="m-0" id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </li>

                </ul>
            </div>
        </div>

    </nav>
</div>

{{--    <nav class="navbar navbar-default bg-primary">--}}
{{--        <div class="container-fluid">--}}
{{--            <!-- Brand and toggle get grouped for better mobile display -->--}}
{{--            <div class="navbar-header">--}}
{{--                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">--}}
{{--                    <span class="sr-only">Toggle navigation</span>--}}
{{--                    <span class="icon-bar"></span>--}}
{{--                    <span class="icon-bar"></span>--}}
{{--                    <span class="icon-bar"></span>--}}
{{--                </button>--}}
{{--                <a class="navbar-brand" href="{{ route('dashboard.index') }}"><img class="img-fluid" width="30%" src="{{asset('storage/images/Logo.png')}}" alt="logo"></a>--}}
{{--            </div>--}}

{{--            <!-- Collect the nav links, forms, and other content for toggling -->--}}
{{--            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">--}}
{{--                <ul class="nav navbar-nav">--}}
{{--                    <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>--}}
{{--                    <li><a href="#">Link</a></li>--}}
{{--                    <li class="dropdown">--}}
{{--                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>--}}
{{--                        <ul class="dropdown-menu">--}}
{{--                            <li><a href="#">Action</a></li>--}}
{{--                            <li><a href="#">Another action</a></li>--}}
{{--                            <li><a href="#">Something else here</a></li>--}}
{{--                            <li role="separator" class="divider"></li>--}}
{{--                            <li><a href="#">Separated link</a></li>--}}
{{--                            <li role="separator" class="divider"></li>--}}
{{--                            <li><a href="#">One more separated link</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--                <form class="navbar-form navbar-left">--}}
{{--                    <div class="form-group">--}}
{{--                        <input type="text" class="form-control" placeholder="Search">--}}
{{--                    </div>--}}
{{--                    <button type="submit" class="btn btn-default">Submit</button>--}}
{{--                </form>--}}
{{--                <ul class="nav navbar-nav navbar-right">--}}
{{--                    <li><a href="#">Link</a></li>--}}
{{--                    <li class="dropdown">--}}
{{--                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>--}}
{{--                        <ul class="dropdown-menu">--}}
{{--                            <li><a href="#">Action</a></li>--}}
{{--                            <li><a href="#">Another action</a></li>--}}
{{--                            <li><a href="#">Something else here</a></li>--}}
{{--                            <li role="separator" class="divider"></li>--}}
{{--                            <li><a href="#">Separated link</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div><!-- /.navbar-collapse -->--}}
{{--        </div><!-- /.container-fluid -->--}}
{{--    </nav>--}}


<div id="id">
    @yield('content')
</div>

<footer>
    <div class="container pt-5">
        <div class="row">
            <div class="col-12 d-flex justify-content-center p-1">
                <img class="logo-footer" src="{{asset('storage/images/logo_footer.png')}}" alt="logo">

            </div>
        </div>
        <div class="container-fluid py-4">
            <div class="row">
                <p><a class="text-white" href="{{ route('contact') }}">Contact</a></p>
                <p><a class="text-white ml-3" href="#">Mentions Légales</a></p>

            </div>

            <hr class="white">
        </div>

    </div>

</footer>


<script src="{{ asset('js/jquerry3.5.1.js') }}" type="text/js"></script>
<script src="{{ asset('js/bootstrap.js') }}" type="text/js"></script>
<script src="{{ asset('js/app.js') }}" type="text/js"></script>

@yield('script-footer')

</body>
</html>
