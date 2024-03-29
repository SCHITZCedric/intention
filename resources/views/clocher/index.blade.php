
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

<div class="container">
    <div class="row">
        <div class="col-sm-7">
          <h3>Liste des clochers</h3>
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
                <a href="javascript:ajaxLoad('{{url('clochers?field=nom&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Nom</a>
                {{request()->session()->get('field')=='nom'?(request()->session()->get('sort')=='asc'?'':''):''}}
            </th>

            <th scope="col">
                <a href="javascript:ajaxLoad('{{url('clochers?field=lieu&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Lieu</a>
                {{request()->session()->get('field')=='lieu'?(request()->session()->get('sort')=='asc'?'':''):''}}
            </th>

            <th width="160px" style="vertical-align: middle">
    <a href="javascript:ajaxLoad('{{url('clochers/create')}}')" class="btn btn-outline-primary btn-sm"> <i class="fa fa-plus" aria-hidden="true"></i> Ajouter un clocher</a>
  </th>


        </tr>
        </thead>

        <tbody id="Table">
        @foreach ($clochers as $clocher)
          <tr>


            <td> {{ $clocher->nom }} </td>
            <td> {{ $clocher->lieu }} </td>


            <td>
                <div class="btn-group btn-group-sm" role="group">

                <a class="btn btn-warning" title="Edit"
                   href="javascript:ajaxLoad('{{url('clochers/update/'.$clocher->id_clocher)}}')"> <i class="fas fa-pencil-alt"></i>
                    Modifier</a>
                <input type="hidden" name="_method" value="delete"/>
                <a class="btn btn-danger" title="Delete" data-toggle="confirmation"
                   href="javascript:if(confirm('Êtes-vous de vouloir supprimer ce clocher?')) ajaxDelete('{{url('clochers/delete/'.$clocher->id_clocher)}}', '{{csrf_token()}}')"> <i class="fas fa-trash-alt"></i>
                    Supprimer
                </a>

                </div>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>


        <ul class="pagination">
            {{ $clochers->links() }}
        </ul>
</div>

<script src="js/live-search.js"></script>
