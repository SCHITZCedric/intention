
<script src="{{ asset('js/app.js') }}"></script>

<div class="container">
    <div class="row">
        <div class="col-sm-7">
          <h3>Choisir une paroisse pour lui transférer des intentions</h3>


        </div>
        <div class="col-sm-5">
          <div class="pull-right">
            <div class="input-group">
                <input class="form-control mr-sm-2" id="search"
                       value="{{ request()->session()->get('search') }}"
                       onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('transfert')}}?search='+this.value)"
                       placeholder="Rechercher une paroisse" name="search"
                       type="search"/>
                <div class="input-group-btn">
                    <button type="submit" class="btn btn-secondary"
                            onclick="ajaxLoad('{{url('transfert')}}?search='+$('#search').val())">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
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

        <tbody>
        @foreach ($transfert as $trans)
          <tr>
            <td> {{ $trans->nom }} </td>
            <td> {{ $trans->lieu }} </td>

            <td>
                <div class="btn-group btn-group-sm" role="group">
                <a class="btn btn-success" title="Transfert" href="javascript:ajaxLoad('{{url('transfert/update/'.$trans->id)}}')">Transférer une intention à la paroisse {{$trans->nom}}</a>
                </div>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

</div>
