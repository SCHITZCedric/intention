
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
            <td> {{ $regler->paroisses->nom }} </td>
            <td> {{ $regler->statuts->statut }} </td>
            <td>
                <div class="btn-group btn-group-sm" role="group">
                <a class="btn btn-primary" title="Regler" href="javascript:ajaxLoad('{{url('regler/update/'.$regler->id_celebrant)}}')">Célébrer une intention à {{$regler->nom}} {{$regler->prenom}}</a>
                </div>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

</div>

  <script src="js/live-search.js"></script>
