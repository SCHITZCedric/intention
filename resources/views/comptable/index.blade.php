<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Comptable</title>
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/style.css">
  <!-- <script src="https://code.jquery.com/jquery-1.10.2.js"></script> -->
  <!-- Custom styles for this template-->
</head>

<?php
setlocale(LC_TIME, 'fra_fra');
?>
<body id="page-top">
  <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
      <div class="container">
              <!--Logo diocèse cliquable barre de naviguation-->
          <a> <img class="navbar-brand" src="./img/logo_diocese.jpg" alt="Logo du diocèse de Nancy/Toul"   width="200" height="110"> </a>
                  <!-- Barre de naviguation-->
              <ul class="navbar-nav ml-auto">
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <li class="nav-item dropdown">
                              <h5> <a id="navbarDropdown" class="nav-link dropdown-toggle" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  <i class="fas fa-user"> </i>
                                  {{ Auth::user()->nom }} {{ Auth::user()->prenom }} <span class="caret"></span>
                                  </a>
                              <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{url('comptable/payer')}}" > <i class="fas fa-euro-sign"></i>
                                    Payer un célébrant
                                </a>
                                <div class="dropdown-divider"></div>
                                  <!----------------------------------------------->
                                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="fas fa-sign-out-alt"></i>
                                      {{ __('Se déconnecter') }}
                                  </a>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      @csrf
                                  </form>
                              </div>
                              </h5>
                          </li>
              </ul>
      </div>
      </div>
  </nav>

<form class="text-center border border-light p-5" action="{{ url('comptable/exporter')}}" method="POST">
@csrf

<div class="container">
    <div class="row">
            <div class="col-sm-7">
              <h3>Liste des intentions</h3>
            </div>
            <div class="col-sm-5">
              <div class="pull-right">
                <div class="input-group">
                    <input class="form-control" id="search" type="text" placeholder="Rechercher...">
                    <div class="input-group-btn">
                    <div class="col-md-12">
                        <div class="pull-right">
                            <div class="row-md-8 mr-md-2">
                            <button type="button" class="btn btn-secondary">Surplus : {{$surplusTotal}} €</button>
                            <button type="submit" class="btn btn-secondary">Exporter</button>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
              </div>
        </div>
    </div>
    <br>
</div>
<div class="container">
  <div>
          <strong>Cocher les coches pour cacher les colonnes</strong><br/>
          <input type="checkbox" class="hidecol" value="reglement" id="col_1" />&nbsp;Reglement
          <input type="checkbox" class="hidecol" value="encaissement" id="col_2" />&nbsp;Offrande
          <input type="checkbox" class="hidecol" value="encaissement" id="col_3" />&nbsp;Surplus
          <input type="checkbox" class="hidecol" value="surplus" id="col_4" />&nbsp;Casuel
          <input type="checkbox" class="hidecol" value="casuel" id="col_5" />&nbsp;Demandeur
          <input type="checkbox" class="hidecol" value="created_at" id="col_6" />&nbsp;Intention&nbsp;
          <input type="checkbox" class="hidecol" value="reglement" id="col_7" />&nbsp;Annoncé le
          <input type="checkbox" class="hidecol" value="encaissement" id="col_8" />&nbsp;Célébrée le
          <input type="checkbox" class="hidecol" value="surplus" id="col_9" />&nbsp;Célébrant
          <input type="checkbox" class="hidecol" value="casuel" id="col_10" />&nbsp;Clocher
      </div>
      </div>

<div class="container">
  <div class="row">

    <div class="col">
      <div class="col-sm-9">

      <table class="table table-hover" id="emp_table">
          <thead>
              <br>
          <tr>
              <th scope="col">
                  <a href="javascript:ajaxLoad('{{url('intentions/?field=reglement&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Reglement</a>
                  {{request()->session()->get('field')=='reglement'?(request()->session()->get('sort')=='asc'?'':''):''}}
              </th>
              <th scope="col">
                  <a href="javascript:ajaxLoad('{{url('intentions/?field=encaissement&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Offrande</a>
                  {{request()->session()->get('field')=='encaissement'?(request()->session()->get('sort')=='asc'?'':''):''}}
              </th>
              <th scope="col">
                  <a href="javascript:ajaxLoad('{{url('intentions/?field=surplus&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Surplus</a>
                  {{request()->session()->get('field')=='surplus'?(request()->session()->get('sort')=='asc'?'':''):''}}
              </th>
              <th scope="col">
                  <a href="javascript:ajaxLoad('{{url('intentions/?field=casuel&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Casuel</a>
                  {{request()->session()->get('field')=='casuel'?(request()->session()->get('sort')=='asc'?'':''):''}}
              </th>

              <th scope="col">
                  <a href="javascript:ajaxLoad('{{url('intentions/?field=personne_demandeuse&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Demandeur</a>
                  {{request()->session()->get('field')=='personne_demandeuse'?(request()->session()->get('sort')=='asc'?'':''):''}}
              </th>

              <th scope="col">
                  <a href="javascript:ajaxLoad('{{url('intentions/?field=intention&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Intention souhaitée</a>
                  {{request()->session()->get('field')=='intention'?(request()->session()->get('sort')=='asc'?'':''):''}}
              </th>
              <th scope="col">
                  <a href="javascript:ajaxLoad('{{url('intentions/?field=date_annoncee&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Annoncée le</a>
                  {{request()->session()->get('field')=='date_annoncee'?(request()->session()->get('sort')=='asc'?'':''):''}}
              </th>
              <th scope="col">
                  <a href="javascript:ajaxLoad('{{url('intentions/?field=date_celebree&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Célébrée le</a>
                  {{request()->session()->get('field')=='date_celebree'?(request()->session()->get('sort')=='asc'?'':''):''}}
              </th>
              <th scope="col">
                  <a href="javascript:ajaxLoad('{{url('intentions/?field=id_celebrants&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Célébrant</a>
                  {{request()->session()->get('field')=='id_celebrants'?(request()->session()->get('sort')=='asc'?'':''):''}}
              </th>
              <th scope="col">
                  <a href="javascript:ajaxLoad('{{url('intentions/?field=id_clochers&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Clocher</a>
                  {{request()->session()->get('field')=='id_clochers'?(request()->session()->get('sort')=='asc'?'':''):''}}
              </th>
          </tr>
          </thead>
      </div>

      </div>


    </div>
</div>


  <tbody id="Table">


  <tr class="col">
  @foreach ($paroisse as $intention)
           <td> {{ $intention->reglement }} </td>
           <td> {{ $intention->encaissement }} </td>
           <td> {{ $intention->surplus }} </td>
           <td> {{ $intention->casuel }} </td>
           <td> {{ $intention->personne_demandeuse }} </td>
           <td> {{ $intention->intention }} </td>
           <td> {{ ($intention->date_annoncee ? date('d/m/Y', strtotime($intention->date_annoncee)) : '') }} </td>
           <td> {{ ($intention->date_celebree ? date('d/m/Y', strtotime($intention->date_celebree)) : '') }} </td>
           @if(isset($intention->celebrants->nom))
           <td> {{ $intention->celebrants->nom }} {{ $intention->celebrants->prenom }}</td>
           @else
           <td> Célébrant inconnu </td>
           @endif
           @if(isset($intention->clochers->nom))
           <td> {{ $intention->clochers->nom }} </td>
           @else
           @if(isset($intention->paroisse_origine))
           <td>{{ $intention->paroisses->nom }}</td>
           @endif
           @endif

  </tr>
  @endforeach


  </tbody>
  </table>

</form>
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="js/live-search.js"></script>
