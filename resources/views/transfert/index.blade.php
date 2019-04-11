
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

<div class="container">
    <div class="row">
        <div class="col-sm-7">
          <h3>Choisir une paroisse pour lui transférer des intentions</h3>
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
            <th scope="col"> <a>Lieu</a> </th>
            <th scope="col"> <a>Action</a> </th>
        </tr>
        </thead>

        <tbody id="Table">
        @foreach ($transfert as $trans)
          <tr>
            <td> {{ $trans->nom_paroisse }} </td>
            <td> {{ $trans->lieu_paroisse }} </td>

            <td>
                <div class="btn-group btn-group-sm" role="group">
                <a class="btn btn-primary" title="Transfert" href="javascript:ajaxLoad('{{url('transfert/update/'.$trans->id)}}')">Transférer une intention à la paroisse {{$trans->nom}}</a>
                </div>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

</div>

<script src="js/live-search.js"></script>
