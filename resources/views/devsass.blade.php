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
                <p>abcdefghijklmnopqrstuvwxyz</p>
            </div>
        </div>
    </div>
</div>

<br>
<br>
<br>

<div class="container">
    <div class="form-group">
        <div class="row">
            <div class="col-md-12">
                <label for="firstname" class="col-md-12 col-form-label">Prénom</label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <input id="firstname" type="firstname"
                       class="form-control"
                       name="firstname" autocomplete="firstname">
            </div>
        </div>
    </div>
</div>

</body>
</html>
