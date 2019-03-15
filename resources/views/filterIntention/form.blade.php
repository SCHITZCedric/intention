

<div class="container">
    <div class="col-md-8 offset-md-2">
        <h1>{{isset($intention)?'Modifier':'Ajouter'}} une intention</h1>
        <hr/>
        @if(isset($intention))
            {!! Form::model($intention,['method'=>'put','id'=>'frm']) !!}
        @else
            {!! Form::open(['id'=>'frm']) !!}
        @endif

        <div class="form-group row required">
            {!! Form::label("reglement","Reglement",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-2">
                {!! Form::text("reglement",null,["class"=>"form-control".($errors->has('reglement')?" is-invalid":""),"autofocus",'placeholder'=>'Reglement']) !!}
                <span id="error-reglement" class="invalid-feedback"></span>
            </div>
        </div>

        <div class="form-group row required">
            {!! Form::label("encaissement","Encaissement",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::text("encaissement",null,["class"=>"form-control".($errors->has('encaissement')?" is-invalid":""),"autofocus",'placeholder'=>'Encaissement']) !!}
                <span id="error-encaissement" class="invalid-feedback"></span>
            </div>
        </div>

        <div class="form-group row">
            {!! Form::label("casuel","Casuel",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::text("casuel",null,["class"=>"form-control".($errors->has('casuel')?" is-invalid":""),"autofocus",'placeholder'=>'Casuel']) !!}
                <span id="error-casuel" class="invalid-feedback"></span>
            </div>
        </div>

        <div class="form-group row required">
            {!! Form::label("intention","Intention",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::text("intention",null,["class"=>"form-control".($errors->has('intention')?" is-invalid":""),"autofocus",'placeholder'=>'Intention']) !!}
                <span id="error-intention" class="invalid-feedback"></span>
            </div>
        </div>

        <div class="form-group row required">
            {!! Form::label("date_souhaitee","Date souhaitee",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::date("date_souhaitee",null,["class"=>"form-control".($errors->has('date_souhaitee')?" is-invalid":""),'placeholder'=>'Date souhaitee']) !!}
                <span id="error-date_souhaitee" class="invalid-feedback"></span>
            </div>
        </div>

        <div class="form-group row">
            {!! Form::label("date_annoncee","Est annoncée",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::date("date_annoncee",null,["class"=>"form-control".($errors->has('date_annoncee')?" is-invalid":""),'placeholder'=>'Est annoncée le']) !!}
                <span id="error-date_annoncee" class="invalid-feedback"></span>
            </div>
        </div>

        <div class="form-group row">
            {!! Form::label("date_celebree","Est célébrée",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::date("date_celebree",null,["class"=>"form-control".($errors->has('date_celebree')?" is-invalid":""),'placeholder'=>'Est célébrée le']) !!}
                <span id="error-date_celebree" class="invalid-feedback"></span>
            </div>
        </div>

        <div class="form-group row">
            {!! Form::label("id_celebrants","Célébrant",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                <select class="form-control" name="id_celebrants">
                    <option selected value="">Choisir un célébrant</option>
                    @foreach ($ListCelebrant as $celebrant)
                      <option value="{{ $celebrant->id }}">{{ $celebrant->nom }} {{ $celebrant->prenom }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row required">
            {!! Form::label("id_clochers","Clocher",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                <select class="form-control" name="id_clochers" >
                    <option selected>Choisir un clocher</option>
                    @foreach ($ListClocher as $clocher)
                      <option value="{{ $clocher->id_clocher }}">{{ $clocher->lieu }} - {{ $clocher->nom }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-3 col-lg-2"></div>
            <div class="col-md-4">
                <a href="javascript:ajaxLoad('{{url('/recherche/resultat')}}')" class="btn btn-danger btn-xs">
                    Retour</a>
                {!! Form::submit("Sauvegarder",["type" => "submit","class"=>"btn btn-primary btn-xs"])!!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
