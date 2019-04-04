
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/checked.js') }}"></script>

@if(isset($transfertCelebrant))
    {!! Form::model($transfertCelebrant,['method'=>'POST','id'=>'frm']) !!}
@else
    {!! Form::open(['method'=>'POST','id'=>'frm']) !!}
@endif


<div class="container">
    <div class="row">
        <div class="col-sm-7">
          <h3>Liste des intentions à régler</h3>
        </div>
        <div class="input-group-btn">
            <div class="col-md-12">
                <div class="pull-right">
                    <div class="row-md-8 mr-md-2">
                          <input type="button" class="form-control" id='count' readonly>
                    </div>
                </div>
            </div>
        </div>



    </div>
    <table class="table table-hover">
        <thead>
            <br>
        <tr>

            <th scope="col"> <a>Date d'ajout</a> </th>
            <th scope="col"> <a>Reglement</a> </th>
            <th scope="col"> <a>Encaissement</a> </th>
            <th scope="col"> <a>Surplus</a> </th>
            <th scope="col"> <a>Casuel</a> </th>
            <th scope="col"> <a>Intention</a> </th>
            <th scope="col"> <a>Annoncée le</a> </th>
            <th scope="col"> <a>Célébre le</a> </th>
            <th scope="col"> <a>Célébrant</a> </th>
            <th scope="col"> <a>Clocher</a> </th>
            <th scope="col"> <a>Transférer l'intention</a> </th>

        </tr>
        </thead>

        <tbody>


  <tr class="col">
        @foreach ($transfertCelebrants as $transfertCelebrant)
            <td> {{ $transfertCelebrant->created_at }} </td>
            <td> {{ $transfertCelebrant->reglement }} </td>
            <td> {{ $transfertCelebrant->encaissement }} </td>
            <td> {{ $transfertCelebrant->surplus }} </td>
            <td> {{ $transfertCelebrant->casuel }} </td>
            <td> {{ $transfertCelebrant->intention }} </td>
            <td> {{ ($transfertCelebrant->date_annoncee ? date('d/m/Y', strtotime($transfertCelebrant->date_annoncee)) : '') }} </td>
            <td> {{ ($transfertCelebrant->date_celebree ? date('d/m/Y', strtotime($transfertCelebrant->date_celebree)) : '') }} </td>
            @if(isset($transfertCelebrant->celebrants->nom))
            <td> {{ $transfertCelebrant->celebrants->nom }} {{ $transfertCelebrant->celebrants->prenom }}</td>
            @else
            <td> Célébrant inconnu </td>
            @endif

            @if(isset($transfertCelebrant->clochers->nom))
            <td> {{ $transfertCelebrant->clochers->nom }}</td>
            @else
            <td> Intention transférée </td>
            @endif

            <td> <input type='checkbox' value="{{$transfertCelebrant->id}}" name="payee[]" id='payeeCheck' class="chkbx"> </td>

        </tr>
        @endforeach


        </tbody>
    </table>
    <div class="form-group row">
        <div class="col-md-3 col-lg-2"></div>
        <div class="col-md-4">
            <a href="{{url('transfert')}}" class="btn btn-danger btn-xs"> Retour</a>

           <!-- {!! Form::submit("Sauvegarder",["type" => "submit","class"=>"btn btn-primary btn-xs"] )!!} -->
           <button type="submit" class="btn btn-primary btn-xs" onclick="return confirm('Êtes-vous sûr de vouloir transférer le(s) intention(s) séléctionnée(s)?');">Transférer</button>

        </div>






    </div>
      {!! Form::close() !!}

</div>
