<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/checked.js') }}"></script>

@if(isset($reglerCelebrant))
    {!! Form::model($reglerCelebrant,['method'=>'POST','id'=>'frm']) !!}
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
            <th scope="col"> <a>Célébrée le</a> </th>
            <th scope="col"> <a>Célébrant</a> </th>
            <th scope="col"> <a>Clocher</a> </th>
            <th scope="col"> <a>Reglement à recevoir</a> </th>

        </tr>
        </thead>

        <tbody>


  <tr class="col">
        @foreach ($reglerCelebrants as $reglerCelebrant)
            <td> {{ $reglerCelebrant->created_at }} </td>
            <td> {{ $reglerCelebrant->reglement }} </td>
            <td> {{ $reglerCelebrant->encaissement }} </td>
            <td> {{ $reglerCelebrant->surplus }} </td>
            <td> {{ $reglerCelebrant->casuel }} </td>
            <td> {{ $reglerCelebrant->intention }} </td>
            <td> {{ ($reglerCelebrant->date_annoncee ? date('d/m/Y', strtotime($reglerCelebrant->date_annoncee)) : '') }} </td>
            <td> {{ ($reglerCelebrant->date_celebree ? date('d/m/Y', strtotime($reglerCelebrant->date_celebree)) : '') }} </td>
            @if(isset($reglerCelebrant->celebrants->nom))
            <td> {{ $reglerCelebrant->celebrants->nom }} {{ $reglerCelebrant->celebrants->prenom }}</td>
            @else
            <td> Célébrant inconnu </td>
            @endif
            @if(isset($reglerCelebrant->clochers->nom))
            <td> {{ $reglerCelebrant->clochers->nom }} </td>
            @else
            <td> Intention transféré </td>
            @endif


            <td> <input type='checkbox' value="{{$reglerCelebrant->id}}" name="payee[]" id='payeeCheck' class="chkbx"> </td>

        </tr>
        @endforeach


        </tbody>
    </table>
    <div class="form-group row">
        <div class="col-md-3 col-lg-2"></div>
        <div class="col-md-4">
            <a href="{{url('/regler')}}" class="btn btn-danger btn-xs"> Retour</a>

           <!-- {!! Form::submit("Sauvegarder",["type" => "submit","class"=>"btn btn-primary btn-xs"] )!!} -->
           <button type="submit" class="btn btn-primary btn-xs" onclick="return confirm('Êtes-vous sûr de vouloir régler le(s) intention(s) séléctionnée(s) ?');">Sauvegarder</button>

        </div>

    </div>
      {!! Form::close() !!}

</div>
