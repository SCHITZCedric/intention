

<div class="container">
    <div class="col-md-8 offset-md-2">
        <h1>{{isset($intention)?'Modifier':'Ajouter'}} une intention</h1>
        <hr/>
        @if(isset($intention))
            {!! Form::model($intention,['method'=>'PUT','id'=>'frm']) !!}
        @else
            {!! Form::open(['id'=>'frm']) !!}
        @endif


        <div class="row">
          <div class="col-md-4">
              <select class="form-control" name="casuel" id="validationTooltip02" required>
                  <option selected value="">Choisir un type d'intention</option>
                  <option value="Intention"> Intention </option>
                  <option value="Mariage"> Mariage </option>
                  <option value="Mariage avec Messe"> Mariage avec Messe</option>
                  <option value="Funérailles"> Funérailles </option>
                  <option value="Funérailles avec Messe"> Funérailles avec Messe </option>
              </select>
              <span id="error-casuel" class="invalid-feedback"></span>
          </div>

          <div class="form-group row required">
              <label>  De / Pour</label>
              <div class="col-md-8">
                  {!! Form::text("intention",null,["class"=>"form-control".($errors->has('intention')?" is-invalid":""),"autofocus",'placeholder'=>'Personne bénéficiaire']) !!}
                  <span id="error-intention" class="invalid-feedback"></span>
              </div>
          </div>
        </div>


    <div class="container">
        <!-- <div class="form-group row required">
            {!! Form::label("date_souhaitee","Date souhaitee",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::date("date_souhaitee",null,["class"=>"form-control".($errors->has('date_souhaitee')?" is-invalid":""),'placeholder'=>'Date souhaitee']) !!}
                <span id="error-date_souhaitee" class="invalid-feedback"></span>
            </div>
        </div> -->
        <div class="form-group row">
            {!! Form::label("personne_demandeuse","Demandeur",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::text("personne_demandeuse",null,["class"=>"form-control".($errors->has('personne_demandeuse')?" is-invalid":""),"autofocus",'placeholder'=>'Demandeur']) !!}
                <span id="error-personne_demandeuse" class="invalid-feedback"></span>
            </div>
        </div>

        <div class="form-group row">
            {!! Form::label("commentaire","Commentaire",["class"=>"col-form col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::textarea("commentaire",null,["class"=>"form-control", "rows"=>"2".($errors->has('commentaire')?" is-invalid":""),"autofocus",'placeholder'=>'Petite précision ? (255 caractères maximum)']) !!}
                <span id="error-commentaire" class="invalid-feedback"></span>
            </div>
        </div>

        <div class="form-group row">
            {!! Form::label("date_annoncee","Annoncée le",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::date("date_annoncee",null,["class"=>"form-control".($errors->has('date_annoncee')?" is-invalid":""),'placeholder'=>'Annoncée le']) !!}
                <span id="error-date_annoncee" class="invalid-feedback"></span>
            </div>
        </div>

        <div class="form-group row required">
            {!! Form::label("id_clochers","Clocher",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8" >
                <select class="form-control" name="id_clochers" id="id_clochers">
                    <option selected value="">Choisir un clocher</option>
                    @foreach ($ListClocher as $clocher)
                      <option value="{{ $clocher->id_clocher }}">{{ $clocher->lieu }} - {{ $clocher->nom }}</option>
                    @endforeach
                </select>
                 <span id="error-id_clochers" class="invalid-feedback"></span>
            </div>
        </div>

        <div class="form-group row required">
            {!! Form::label("id_celebrants","Célébrant",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8" >
                <select class="form-control" name="id_celebrants" id="id_celebrants">
                    <option selected value="">Choisir un célébrant</option>
                    @foreach ($ListCelebrant as $celebrant)
                      <option value="{{ $celebrant->id_celebrant }}">{{ $celebrant->paroisses->nom }} : {{ $celebrant->nom }} {{ $celebrant->prenom }}</option>
                    @endforeach
                </select>
                 <span id="error-id_celebrants" class="invalid-feedback"></span>
            </div>
        </div>

        <div class="form-group row">
            {!! Form::label("date_celebree","Célébrée le ",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::date("date_celebree",null,["class"=>"form-control".($errors->has('date_celebree')?" is-invalid":""),'placeholder'=>'Annoncée le ']) !!}
                <span id="error-date_celebree" class="invalid-feedback"></span>
            </div>
        </div>




            <div class="form-group row required">
                {!! Form::label("reglement","Type de reglement",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                <div class="col-md-8">
                    {!! Form::text("reglement",null,["class"=>"form-control".($errors->has('reglement')?" is-invalid":""),"autofocus",'placeholder'=>'Exemple : ESP, CHQ, etc...']) !!}
                    <span id="error-reglement" class="invalid-feedback"></span>
                </div>
            </div>

            <div class="form-group row required">
                {!! Form::label("encaissement","Montant de l'offrande",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                <div class="col-md-8">
                    {!! Form::text("encaissement",null,["class"=>"form-control".($errors->has('encaissement')?" is-invalid":""),"autofocus",'placeholder'=>'Exemple : 17, 10, 22, etc...']) !!}
                    <span id="error-encaissement" class="invalid-feedback"></span>
                </div>
            </div>

    </div>


        <div class="form-group row">
            <div class="col-md-3 col-lg-2"></div>
            <div class="col-md-4">
                <a href="javascript:ajaxLoad('{{url('/intentions')}}')" class="btn btn-danger btn-xs">
                    Retour</a>
                {!! Form::submit("Sauvegarder",["type" => "submit","class"=>"btn btn-primary btn-xs"])!!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
