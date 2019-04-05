<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Description" content="Outil numérique qui permet de faciliter la gestion des intentions de Messe dans les diocèses de Nancy/Toul et Sait-Dié">
    <meta name="theme-color" content="#005ff9"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="favicon.ico" >
     <link rel="shortcut icon" href="./img/gif/favicon.ico" >
    <!-- Titre -->
    <title>Outil d'intention de Messe</title>
    @yield('head')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    @yield('css')
</head>
    <!--Body-->
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                    <!--Logo diocèse cliquable barre de naviguation-->
                <a href="{{ url('/accueil') }}"> <img class="navbar-brand" src="./img/logo_diocese.jpg" alt="Logo du diocèse de Nancy/Toul"   width="200" height="110"> </a>
                        <!-- Barre de naviguation-->
                    <ul class="navbar-nav ml-auto">
                        @guest
                        @else


                        <div class="collapse navbar-collapse" id="navbarSupportedContent">


                                <li class="nav-item dropdown">

                                    <h5> <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="fas fa-user"> </i>
                                        {{ Auth::user()->nom }} {{ Auth::user()->prenom }} <span class="caret"></span>
                                        </a>
                                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item disabled" tabindex="-1" aria-disabled="true">Panneau administrateur</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ url('/celebrants/') }}"> <i class="fas fa-user-cog"></i> Gérer les célébrants</a>
                                        <a class="dropdown-item" href="{{ url('/utilisateurs') }}"> <i class="fas fa-users-cog"></i> Gérer les utilisateurs</a>

                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ url('/paroisses') }}"><i class="fas fa-place-of-worship"></i></i> Gérer les paroisses</a>
                                        <a class="dropdown-item" href="{{ url('/clochers') }}"> <i class="fas fa-church"></i> Gérer les clochers</a>
                                        <!----------------------------------------------->
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="fas fa-sign-out-alt"></i>
                                            {{ __('Se déconnecter') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                    </h5>
                                </li>
                        @endguest
                    </ul>
            </div>
            @yield('nav')
            </div>
        </nav>
</div>
        <main class="py-4">
            @yield('content')
            <div class="footer-bottom">

          	<div class="container">

          		<div class="row">

          			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

          				<div class="copyright">

          					© 2019, GIE LES DEUX EVECHES, Tous droits réservés

          				</div>

          			</div>


          		</div>

          	</div>

          </div>



            @yield('footer')

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
            @yield('js')


        </main>

</body>
</html>
