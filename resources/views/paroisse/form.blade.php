
<div class="container">
    <div class="col-md-8 offset-md-2">
        <h1>{{isset($paroisse)?'Modifier':'Ajouter'}} un paroisse</h1>
        <hr/>
        @if(isset($paroisse))
            {!! Form::model($paroisse,['method'=>'put','id'=>'frm']) !!}
        @else
            {!! Form::open(['id'=>'frm']) !!}
        @endif
        <div class="form-group row required">
            {!! Form::label("nom_paroisse","Nom",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::text("nom_paroisse",null,["class"=>"form-control".($errors->has('nom_paroisse')?" is-invalid":""),"autofocus",'placeholder'=>'Nom']) !!}
                <span id="error-nom_paroisse" class="invalid-feedback"></span>
            </div>
        </div>

        <div class="form-group row required">
            {!! Form::label("lieu_paroisse","Lieu",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::text("lieu_paroisse",null,["class"=>"form-control".($errors->has('lieu_paroisse')?" is-invalid":""),"autofocus",'placeholder'=>'Lieu']) !!}
                <span id="error-lieu_paroisse" class="invalid-feedback"></span>
            </div>
        </div>



        <div class="form-group row">
            <div class="col-md-3 col-lg-2"></div>
            <div class="col-md-4">
                  <a href="{{url('paroisses')}}" class="btn btn-danger btn-xs">
                    Retour</a>

                {!! Form::submit("Sauvegarder",["type" => "submit","class"=>"btn btn-primary btn-xs"])!!}


            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
