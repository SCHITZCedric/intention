@extends ('layouts.app')

@section('content')

<!-- Default form register -->
<form class="text-center border border-light p-5" action="{{ url('accueil/exporter/export')}}" method="POST">
@csrf
    <p class="h4 mb-4">Vous souhaitez exporter une ou plusieurs intention  au format Excel</p>

<div class="container">
    <div class="form-row mb-4">

        <div class="col">

            <div class="form-group row">
                {!! Form::label("date_celebree","Célébrée le",["class"=>"col-form-label col-md-3 col-lg-4"]) !!}
                <div class="col-md-8">

            <input class="form-control"  type="date" name="date_celebree">
            </div>
        </div>
        </div>

        <div class="col">

            <div class="form-group row">
                {!! Form::label("from_date","Du",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                <div class="col-md-8">
                    <input class="form-control"  type="date" name="from_date">
            </div>
        </div>
        </div>



        <div class="col">
            <div class="form-group row">
                {!! Form::label("to_date","Au",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                <div class="col-md-8">
                    <input class="form-control"  type="date" name="to_date">
                </div>
            </div>
        </div>
    </div>


    <div class="form-row mb-4">
        <div class="col">
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
        </div>

        <div class="col">
            <div class="form-group row">
                {!! Form::label("id_clochers","Clocher",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                <div class="col-md-8">
                    <select class="form-control" name="id_clochers">
                        <option selected value="">Choisir un clocher</option>
                        @foreach ($ListClocher as $clocher)
                          <option value="{{ $clocher->id_clocher }}">{{ $clocher->lieu }} - {{ $clocher->nom }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>


    <div class="form-row mb-4">

        <div class="col">

            <div class="form-group row">
                {!! Form::label("casuel","Type d'intention",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                <div class="col-md-8">
                    <select class="form-control" name="casuel">
                        <option selected value="">Choisir un type d'intention</option>
                        <option value="Intention"> Intention </option>
                        <option value="Mariage"> Mariage </option>
                        <option value="Obsèque"> Obsèque </option>
                    </select>
            </div>
        </div>
        </div>

        <div class="col">

            <div class="form-group row">
                {!! Form::label("etat","Etat",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                <div class="col-md-8">

                    <select class="form-control" name="etat">
                        <option selected value="">Choisir un état</option>
                        <option value="1"> Annoncée </option>
                        <option value="2"> Célébrée </option>
                    </select>
            </div>
        </div>
        </div>


    </div>

        <!-- Sign up button -->
    <button class="btn btn-outline-primary my-4 btn-block" type="submit">Exporter les intentions</button>

</div>


    <!-- Social register -->


</form>
<!-- Default form register -->


@endsection
