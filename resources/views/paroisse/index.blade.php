
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

<div class="container">
    <div class="row">
        <div class="col-sm-7">
          <h3>Liste des paroisses</h3>
        </div>
        <div class="col-sm-5">
          <div class="pull-left">
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
                <a href="javascript:ajaxLoad('{{url('paroisses?field=nom&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Nom</a>
                {{request()->session()->get('field')=='nom'?(request()->session()->get('sort')=='asc'?'':''):''}}
            </th>

            <th scope="col">
                <a href="javascript:ajaxLoad('{{url('paroisses?field=lieu&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Lieu</a>
                {{request()->session()->get('field')=='lieu'?(request()->session()->get('sort')=='asc'?'':''):''}}
            </th>

            <th width="160px" style="vertical-align: middle">
    <a href="javascript:ajaxLoad('{{url('paroisses/create')}}')" class="btn btn-outline-primary btn-sm"> <i class="fa fa-plus" aria-hidden="true"></i> Ajouter un paroisse</a>
  </th>


        </tr>
        </thead>

        <tbody id="Table">
        @foreach ($paroisses as $paroisse)
          <tr>


            <td> {{ $paroisse->nom }} </td>
            <td> {{ $paroisse->lieu }} </td>


            <td>
                <div class="btn-group btn-group-sm" role="group">

                <a class="btn btn-warning" title="Edit"
                   href="javascript:ajaxLoad('{{url('paroisses/update/'.$paroisse->id)}}')"> <i class="fas fa-pencil-alt"></i>
                    Modifier</a>
                <input type="hidden" name="_method" value="delete"/>
                <a class="btn btn-danger" title="Delete" data-toggle="confirmation"
                   href="javascript:if(confirm('Êtes-vous de vouloir supprimer ce paroisse?')) ajaxDelete('{{url('paroisses/delete/'.$paroisse->id)}}', '{{csrf_token()}}')"> <i class="fas fa-trash-alt"></i>
                    Supprimer
                </a>

                </div>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>


        <ul class="pagination">
            {{ $paroisses->links() }}
        </ul>
</div>

<script src="js/live-search.js"></script>
