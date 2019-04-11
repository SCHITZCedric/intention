
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

<div class="container">
    <div class="row">
        <div class="col-sm-7">
          <h3>Liste des utilisateurs</h3>
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
                <a href="javascript:ajaxLoad('{{url('utilisateurs?field=nom&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Nom</a>
                {{request()->session()->get('field')=='nom'?(request()->session()->get('sort')=='asc'?'':''):''}}
            </th>

            <th scope="col">
                <a href="javascript:ajaxLoad('{{url('utilisateurs?field=prenom&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Prénom</a>
                {{request()->session()->get('field')=='prenom'?(request()->session()->get('sort')=='asc'?'':''):''}}
            </th>

            <th scope="col">
                <a href="javascript:ajaxLoad('{{url('utilisateurs?field=email&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Adresse mail</a>
                {{request()->session()->get('field')=='email'?(request()->session()->get('sort')=='asc'?'':''):''}}
            </th>

            <th scope="col">
                <a href="javascript:ajaxLoad('{{url('utilisateurs?field=id_paroisses&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Paroisse</a>
                {{request()->session()->get('field')=='id_paroisses'?(request()->session()->get('sort')=='asc'?'':''):''}}
            </th>

            <th scope="col">
                <a href="javascript:ajaxLoad('{{url('utilisateurs?field=id_roles&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Rôle</a>
                {{request()->session()->get('field')=='id_roles'?(request()->session()->get('sort')=='asc'?'':''):''}}
            </th>

            <th width="160px" style="vertical-align: middle">
    <a href="javascript:ajaxLoad('{{url('utilisateurs/create')}}')" class="btn btn-outline-primary btn-sm"> <i class="fa fa-plus" aria-hidden="true"></i> Ajouter un utilisateur</a>
  </th>

        </tr>
        </thead>

          <tbody id="Table">
        @foreach ($utilisateurs as $utilisateur)
          <tr>


            <td> {{ $utilisateur->nom }} </td>
            <td> {{ $utilisateur->prenom }} </td>
            <td> {{ $utilisateur->email }} </td>
            <td> {{ $utilisateur->paroisses->lieu_paroisse }} - {{ $utilisateur->paroisses->nom_paroisse }} </td>
            <td> {{ $utilisateur->roles->role }} </td>


            <td>
                <div class="btn-group btn-group-sm" role="group">

                <a class="btn btn-warning" title="Edit"
                   href="javascript:ajaxLoad('{{url('utilisateurs/update/'.$utilisateur->id)}}')"> <i class="fas fa-pencil-alt"></i>
                    Modifier</a>
                <input type="hidden" name="_method" value="delete"/>
                <a class="btn btn-danger" title="Delete" data-toggle="confirmation"
                   href="javascript:if(confirm('Êtes-vous de vouloir supprimer cet utilisateur?')) ajaxDelete('{{url('utilisateurs/delete/'.$utilisateur->id)}}', '{{csrf_token()}}')"> <i class="fas fa-trash-alt"></i>
                    Supprimer
                </a>

                </div>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>


        <ul class="pagination">
            {{ $utilisateurs->links() }}
        </ul>
</div>


  <script src="js/live-search.js"></script>
