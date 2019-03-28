@extends ('layouts.app')

<script src="{{ asset('/js/app.js') }}" defer></script>

@section('content')
<div class="container">




  <!-- <a href="{{url('/intentions')}}" type="button" class="btn btn-outline-primary btn-lg btn-block" data-toggle="data" title="En cliquant sur ce bouton, vous allez pouvoir rechercher une intention"> <i class="fas fa-search"></i> Rechercher une intention</a>

  <a href="{{url('accueil/ajouter-intention')}}" type="button" class="btn btn-outline-primary btn-lg btn-block" data-toggle="data" title="En cliquant sur ce bouton, vous allez pouvoir ajouter une nouvelle intention" >  <i class="fas fa-plus"></i>   Saisir une intention</a>

  <a href="{{url('/ajouter-intention')}}" type="button" class="btn btn-outline-primary btn-lg btn-block" data-toggle="data" title="En cliquant sur ce bouton, vous allez pouvoir modifier une intention"> <i class="fas fa-pencil-alt"></i> Saisir une intention</a>

  <a href="{{ url('/regler') }}" type="button" class="btn btn-outline-primary btn-lg btn-block"  data-toggle="data" title="En cliquant sur ce bouton, vous allez pouvoir célébrer une intention"> <i class="fas fa-check"></i> Gestion des célébrations</a>

  <a href="{{ url('/transfert') }}" type="button" class="btn btn-outline-primary btn-lg btn-block" data-toggle="data" title="En cliquant sur ce bouton, vous allez pouvoir choisir une paroisse pour lui transférer des intentions"> <i class="fas fa-exchange-alt"></i> Transférer des intentions</a>

  <a href="{{ url('/exporter') }}" type="button" class="btn btn-outline-primary btn-lg btn-block"  data-toggle="data" title="En cliquant sur ce bouton, vous allez pouvoir célébrer une intention"> <i class="far fa-file-excel"></i></i> Exporter en format Excel</a>

  <a href="{{ url('/statistiques') }}" type="button" class="btn btn-outline-primary btn-lg btn-block"  data-toggle="data" title="En cliquant sur ce bouton, vous allez obtenir des statistiques sur votre paroisse"> <i class="fas fa-chart-pie"></i></i></i> Statistiques de votre paroisse</a> -->

<div class="row">
  <div class="col-sm-4">
    <div class="card">
      <div class="card-header">
        Rechercher une intention
      </div>
      <div class="card-body">
        <h5 class="card-title"></h5>
        <p class="card-text">En cliquant sur ce bouton, vous allez pouvoir rechercher une intention</p>
        <a href="{{url('/intentions')}}" class="btn btn-outline-primary"><i class="fas fa-search"></i> Rechercher une intention</a>
      </div>
    </div>
</div>

<div class="col-sm-4">
  <div class="card">
    <div class="card-header">
      Saisir une intention
    </div>
    <div class="card-body">
      <h5 class="card-title"></h5>
      <p class="card-text">En cliquant sur ce bouton, vous allez pouvoir saisir une intention</p>
      <a href="{{url('/ajouter-intention')}}" class="btn btn-outline-primary"><i class="fas fa-pencil-alt"></i> Saisir une intention</a>
    </div>
  </div>

  </div>

<div class="col-sm-4">
<div class="card">
    <div class="card-header">
      Régler une intention
    </div>
    <div class="card-body">
      <h5 class="card-title"></h5>
      <p class="card-text">En cliquant sur ce bouton, vous allez pouvoir régler une intention</p>
      <a href="{{ url('/regler') }}" class="btn btn-outline-primary"><i class="fas fa-check"></i> Gestion des célébrations</a>
    </div>
  </div>
</div>

</div>

<br>

<div class="row">
  <div class="col-sm-4">
  <div class="card">
    <div class="card-header">
      Transférer une intention
    </div>
    <div class="card-body">
      <h5 class="card-title"></h5>
      <p class="card-text">En cliquant sur ce bouton, vous allez pouvoir choisir une paroisse pour lui transférer des intentions</p>
      <a href="{{url('/transfert')}}" class="btn btn-outline-primary"><i class="fas fa-exchange-alt"></i> Transférer des intentions</a>
    </div>
  </div>
</div>


<div class="col-sm-4">
  <div class="card">
    <div class="card-header">
      Exporter une intention
    </div>
    <div class="card-body">
      <h5 class="card-title"></h5>
      <p class="card-text">En cliquant sur ce bouton, vous allez pouvoir exporter des intentions au format Excel</p>
      <a href="{{ url('/exporter') }}" class="btn btn-outline-primary"><i class="far fa-file-excel"></i></i> Exporter au format Excel</a>
    </div>
  </div>
</div>


<div class="col-sm-4">
  <div class="card">
    <div class="card-header">
      Obtenir des statistiques
    </div>
    <div class="card-body">
      <h5 class="card-title"></h5>
      <p class="card-text">En cliquant sur ce bouton, vous allez pouvoir obtenir des statistiques de votre paroisse</p>
      <a href="{{ url('/statistiques') }}" class="btn btn-outline-primary"><i class="fas fa-chart-pie"></i></i></i> Statistiques de votre paroisse</a>
    </div>
  </div>
</div>

</div>







</div>

@endsection

@section('js')
  <script src="{{ asset('/js/ajax.js') }}"></script>

@endsection

<script>
  $(document).ready(function()
  {
    $('[data-toggle="data"]').tooltip();
  });
</script>
