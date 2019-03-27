@extends ('layouts.app')

<script src="{{ asset('/js/app.js') }}" defer></script>

@section('content')
<div class="container">
<div class="row-md-6">



  <a href="{{url('/recherche')}}" type="button" class="btn btn-outline-primary btn-lg btn-block" data-toggle="data" title="En cliquant sur ce bouton, vous allez pouvoir rechercher une intention"> <i class="fas fa-search"></i> Rechercher une intention</a>

  <!-- <a href="{{url('accueil/ajouter-intention')}}" type="button" class="btn btn-outline-primary btn-lg btn-block" data-toggle="data" title="En cliquant sur ce bouton, vous allez pouvoir ajouter une nouvelle intention" >  <i class="fas fa-plus"></i>   Saisir une intention</a> -->

  <a href="{{url('/ajouter-intention')}}" type="button" class="btn btn-outline-primary btn-lg btn-block" data-toggle="data" title="En cliquant sur ce bouton, vous allez pouvoir modifier une intention"> <i class="fas fa-pencil-alt"></i> Saisir une intention</a>

  <a href="{{ url('/regler') }}" type="button" class="btn btn-outline-primary btn-lg btn-block"  data-toggle="data" title="En cliquant sur ce bouton, vous allez pouvoir célébrer une intention"> <i class="fas fa-check"></i> Gestion des célébrations</a>

  <a href="{{ url('/transfert') }}" type="button" class="btn btn-outline-primary btn-lg btn-block" data-toggle="data" title="En cliquant sur ce bouton, vous allez pouvoir choisir une paroisse pour lui transférer des intentions"> <i class="fas fa-exchange-alt"></i> Transférer des intentions</a>

  <a href="{{ url('/exporter') }}" type="button" class="btn btn-outline-primary btn-lg btn-block"  data-toggle="data" title="En cliquant sur ce bouton, vous allez pouvoir célébrer une intention"> <i class="far fa-file-excel"></i></i> Exporter en format Excel</a>

  <a href="{{ url('/statistiques') }}" type="button" class="btn btn-outline-primary btn-lg btn-block"  data-toggle="data" title="En cliquant sur ce bouton, vous allez obtenir des statistiques sur votre paroisse"> <i class="fas fa-chart-pie"></i></i></i> Statistiques de votre paroisse</a>



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
