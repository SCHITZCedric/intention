
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<div class="container">
    <div class="row">
        <div class="col-sm-7">
          <h3>Liste des celebrants</h3>
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


            <th scope="col">
                <a href="javascript:ajaxLoad('{{url('celebrants?field=nom&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Nom</a>
                {{request()->session()->get('field')=='nom'?(request()->session()->get('sort')=='asc'?'':''):''}}
            </th>

            <th scope="col">
                <a href="javascript:ajaxLoad('{{url('celebrants?field=prenom&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Prénom</a>
                {{request()->session()->get('field')=='prenom'?(request()->session()->get('sort')=='asc'?'':''):''}}
            </th>

            <th scope="col">
                <a href="javascript:ajaxLoad('{{url('celebrants?field=en_service&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">En service</a>
                {{request()->session()->get('field')=='en_service'?(request()->session()->get('sort')=='asc'?'':''):''}}
            </th>

            <th scope="col">
                <a href="javascript:ajaxLoad('{{url('celebrants?field=compteur_messe&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Nombre de messe restante</a>
                {{request()->session()->get('field')=='compteur_messe'?(request()->session()->get('sort')=='asc'?'':''):''}}
            </th>

            <th scope="col">
                <a href="javascript:ajaxLoad('{{url('celebrants?field=compteur_messe&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Nombre de binage ce mois ci</a>
                {{request()->session()->get('field')=='compteur_messe'?(request()->session()->get('sort')=='asc'?'':''):''}}
            </th>

            <th scope="col">
                <a href="javascript:ajaxLoad('{{url('celebrants?field=id_paroisses&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Paroisses</a>
                {{request()->session()->get('field')=='id_paroisses'?(request()->session()->get('sort')=='asc'?'':''):''}}
            </th>

            <th scope="col">
                <a href="javascript:ajaxLoad('{{url('celebrants?field=id_statuts&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Statut</a>
                {{request()->session()->get('field')=='id_statuts'?(request()->session()->get('sort')=='asc'?'':''):''}}
            </th>




            <th width="160px" style="vertical-align: middle">
    <a href="javascript:ajaxLoad('{{url('celebrants/create')}}')" class="btn btn-outline-primary btn-sm"> <i class="fa fa-plus" aria-hidden="true"></i> Ajouter une personne</a>
  </th>


        </tr>
        </thead>

        <tbody id="Table">
        @foreach ($celebrants as $celebrant)
          <tr>


            <td> {{ $celebrant->nom }} </td>
            <td> {{ $celebrant->prenom }} </td>
            @if($celebrant->en_service == 1)
            <td> <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="customCheck1" checked disabled>
              <label class="custom-control-label" for="customCheck1" checked></label>
                </div></td>
            @else
            <td> Inactif </td>
            @endif
            <td> {{ $celebrant->compteur_messe }} </td>
            <td> {{ $celebrant->compteur_binage }} </td>
            <td> {{ $celebrant->paroisses->nom_paroisse }} </td>
            <td> {{ $celebrant->statuts->statut }} </td>


            <td>
                <div class="btn-group btn-group-sm" role="group">

                <a class="btn btn-warning" title="Edit"
                   href="javascript:ajaxLoad('{{url('celebrants/update/'.$celebrant->id_celebrant)}}')">  <i class="fas fa-pencil-alt"></i>
                    Modifier</a>
                <input type="hidden" name="_method" value="delete"/>
                <a class="btn btn-danger" title="Delete" data-toggle="confirmation"
                   href="javascript:if(confirm('Êtes-vous de vouloir supprimer cette personne?')) ajaxDelete('{{url('celebrants/delete/'.$celebrant->id_celebrant)}}', '{{csrf_token()}}')"> <i class="fas fa-trash-alt"></i>
                    Supprimer
                </a>

                </div>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
        <ul class="pagination">
            {{ $celebrants->links() }}
        </ul>
</div>

<script src="js/live-search.js"></script>
