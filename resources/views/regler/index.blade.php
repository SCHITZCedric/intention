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

  <!-- <script src="https://code.jquery.com/jquery-1.10.2.js"></script> -->
  <!-- Custom styles for this template-->
</head>

<?php
setlocale(LC_TIME, 'fra_fra');
?>
<body id="page-top">

<script src="{{ asset('js/app.js') }}"></script>

<div class="container">
    <div class="row">
        <div class="col-sm-7">
          <h3>Choisir un célébrant</h3>


        </div>
        <div class="col-sm-5">
          <div class="pull-right">
            <div class="input-group">
            <input class="form-control" id="search" type="text" placeholder="Rechercher...">
            </div>
          </div>
        </div>
    </div>

    <table class="table table-hover">
        <thead>
            <br>
        <tr>
            <th scope="col"> <a>Nom</a> </th>
            <th scope="col"> <a>Prénom</a> </th>
            <th scope="col"> <a>Nombre de messe restante</a> </th>
            <th scope="col"> <a>Nombre de binage ce mois-ci</a> </th>
            <th scope="col"> <a>Paroisses</a> </th>
            <th scope="col"> <a>Statut</a> </th>
            <th scope="col"> <a>Action</a> </th>
        </tr>
        </thead>

        <tbody id="Table">
        @foreach ($reglers as $regler)
          <tr>
            <td> {{ $regler->nom }} </td>
            <td> {{ $regler->prenom }} </td>
            <td> {{ $regler->compteur_messe }} </td>
            <td> {{ $regler->compteur_binage }} </td>
            <td> {{ $regler->paroisses->nom_paroisse }} </td>
            <td> {{ $regler->statuts->statut }} </td>
            <td>
                <div class="btn-group btn-group-sm" role="group">
                <a class="btn btn-primary" title="Regler" href="javascript:ajaxLoad('{{url('regler/update/'.$regler->id_celebrant)}}')">Régler une intention à {{$regler->nom}} {{$regler->prenom}}</a>
                </div>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

</div>

  <script src="js/live-search.js"></script>
