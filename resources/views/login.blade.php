<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Gestion des reservations des stades">
    <meta name="keywords" content="gestion reservation stade cameroun" />
    <meta name="author" content="arensamrt">

    <title>ArenSmart | Login</title>

    <!-- vendor css -->
    <link href="{{asset('backend/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('backend/lib/Ionicons/css/ionicons.css')}}" rel="stylesheet">


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{asset('backend/css/starlight.css')}}">
    <style>
        body {
            background: url('{{ asset('backend/img/bg.png') }}') no-repeat center center fixed !important;
            background-size: cover;
        }
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(78,60,79, 0.2);
            z-index: -1;
        }

        .login-logo>img{
            width: 5rem;
        }
    </style>
</head>

<body>

<div class="d-flex align-items-center justify-content-center  ht-100v">

    <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center mg-b-30">
            <a href="{{route('home')}}" title="Retourner a la page d'accueil">
                <img style="width: 50%" src="{{asset('backend/img/logo.png')}}" alt="logo">
            </a>
        </div>

        <form method="POST" action="{{route('login')}}">
            @csrf
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Entrer Votre Email" required/>
            </div><!-- form-group -->
            <div class="form-group">
                <input type="password"  name="password" class="form-control" placeholder="Entrer Votre Mot de passe" required/>
                <a href="{{route('password.request')}}" class="tx-success tx-12 d-block mg-t-10">Mot de passe oublié?</a>
            </div><!-- form-group -->
            <input style="outline: none" type="submit" class="btn btn-success btn-block" value="Connexion">
        </form>

        <div class="mg-t-60 tx-center">Pas de compte? <a href="{{route('register')}}" class="tx-success">Inscrivez-vous ici</a></div>
    </div>
    <!-- login-wrapper -->
</div><!-- d-flex -->

<script src="{{asset('backend/lib/jquery/jquery.js')}}"></script>
<script src="{{asset('backend/lib/popper.js/popper.js')}}"></script>
<script src="{{asset('backend/lib/bootstrap/bootstrap.js')}}"></script>

</body>
</html>
