
<div class="container">
    <div class="col-md-8 offset-md-2">
        <h1>{{isset($celebrant)?'Modifier':'Ajouter'}} un célébrant</h1>
        <hr/>
        @if(isset($celebrant))
            {!! Form::model($celebrant,['method'=>'put','id'=>'frm']) !!}
        @else
            {!! Form::open(['id'=>'frm']) !!}
        @endif
        <div class="form-group row required">
            {!! Form::label("nom","Nom",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::text("nom",null,["class"=>"form-control".($errors->has('nom')?" is-invalid":""),"autofocus",'placeholder'=>'Nom']) !!}
                <span id="error-nom" class="invalid-feedback"></span>
            </div>
        </div>

        <div class="form-group row required">
            {!! Form::label("prenom","Prénom",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::text("prenom",null,["class"=>"form-control".($errors->has('prenom')?" is-invalid":""),"autofocus",'placeholder'=>'Prénom']) !!}
                <span id="error-prenom" class="invalid-feedback"></span>
            </div>
        </div>


        <div class="form-group row required">
            {!! Form::label("en_service","En service",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::checkbox("en_service",true,["class"=>"form-control".($errors->has('en_service')?" is-invalid":""),"autofocus",'placeholder'=>'Casuel']) !!}
                <span id="error-en_service" class="invalid-feedback"></span>
            </div>
        </div>

        <div class="form-group row required">
            {!! Form::label("compteur_messe","Nombre de messe restante",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::text("compteur_messe",null,["class"=>"form-control".($errors->has('compteur_messe')?" is-invalid":""),"autofocus",'placeholder'=>'Nombre de messe restante']) !!}
                <span id="error-compteur_messe" class="invalid-feedback"></span>
            </div>
        </div>

        <div class="form-group row required">
            {!! Form::label("id_paroisses","Paroisse",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                <select class="form-control" name="id_paroisses">
                  <option selected>Choisir une paroisse</option>
                    @foreach ($ListParoisse as $paroisse)
                      <option value="{{ $paroisse->id }}">{{ $paroisse->lieu_paroisse }} - {{ $paroisse->nom_paroisse }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row required">
            {!! Form::label("id_statuts","Statut",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                <select class="form-control" name="id_statuts">
                  <option selected>Choisir un statut</option>
                    @foreach ($ListStatut as $statut)
                      <option value="{{ $statut->id }}">{{ $statut->statut }}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <div class="form-group row">
            <div class="col-md-3 col-lg-2"></div>
            <div class="col-md-4">
                <a href="{{url('celebrants')}}" class="btn btn-danger btn-xs">
                    Retour</a>

                {!! Form::submit("Sauvegarder",["type" => "submit","class"=>"btn btn-primary btn-xs"])!!}

            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
