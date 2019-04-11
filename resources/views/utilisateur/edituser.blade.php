
<div class="container">
    <div class="col-md-8 offset-md-2">
        <h1>{{isset($utilisateur)?'Modifier':'Ajouter'}} un utilisateur</h1>
        <hr/>
        @if(isset($utilisateur))
            {!! Form::model($utilisateur,['method'=>'put','id'=>'frm']) !!}
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
            {!! Form::label("email","Adresse mail",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::email("email",null,["class"=>"form-control".($errors->has('email')?" is-invalid":""),"autofocus",'placeholder'=>'Adresse mail']) !!}
                <span id="error-email" class="invalid-feedback"></span>
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
                  {!! Form::label("id_roles","Statut",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                  <div class="col-md-8">
                      <select class="form-control" name="id_roles">
                          <option selected>Choisir un rôle</option>
                          @foreach ($ListRole as $role)
                            <option value="{{ $role->id }}">{{ $role->role }}</option>
                          @endforeach
                      </select>
                  </div>
              </div>




        <div class="form-group row">
            <div class="col-md-3 col-lg-2"></div>
            <div class="col-md-4">
                <a href="{{url('utilisateurs')}}" class="btn btn-danger btn-xs">
                    Retour</a>

                {!! Form::submit("Sauvegarder",["type" => "submit","class"=>"btn btn-primary btn-xs"])!!}

            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
