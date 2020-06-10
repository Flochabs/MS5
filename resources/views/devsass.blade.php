<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MS5</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body>


<button class="bouton-inscription">Inscription</button>
<button class="bouton-connexion">Connexion</button>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card text-center">
                <h1><b>Céez votre compte</b></h1>
                <p>Coucou</p>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<div class="container">
    <div class="form-group row">
        <label for="firstname"
               class="col-md-4 col-form-label text-md-right">Prénom</label>

        <div class="col-md-6">
            <input id="firstname" type="firstname"
                   class="form-control"
                   name="firstname" autocomplete="firstname">
        </div>
    </div>
</div>


</body>
</html>
