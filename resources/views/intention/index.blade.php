
<script src="{{ asset('/js/app.js') }}" defer></script>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

<div class="container">
    <div class="row">
            <div class="col-sm-7">
              <h3>Liste des intentions</h3>
            </div>
            <div class="col-sm-5">
              <div class="pull-right">
                <div class="input-group">
                    <input class="form-control" id="search" type="text" placeholder="Rechercher...">
                    <div class="input-group-btn">
                    <div class="col-md-12">
                        <div class="pull-right">
                            <div class="row-md-8 mr-md-2">
                            <button type="button" class="btn btn-secondary">Surplus : {{$surplusTotal}} €</button>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
              </div>
        </div>
    </div>
    <br>
</div>
<div class="container">
  <div>
          <strong>Cocher les coches pour cacher les colonnes</strong><br/>
          <input type="checkbox" class="hidecol" value="created_at" id="col_1" />&nbsp;Date d'ajout&nbsp;
          <input type="checkbox" class="hidecol" value="reglement" id="col_2" />&nbsp;Reglement
          <input type="checkbox" class="hidecol" value="encaissement" id="col_3" />&nbsp;Offrande
          <input type="checkbox" class="hidecol" value="encaissement" id="col_4" />&nbsp;Surplus
          <input type="checkbox" class="hidecol" value="surplus" id="col_5" />&nbsp;Casuel
          <input type="checkbox" class="hidecol" value="casuel" id="col_6" />&nbsp;Demandeur
          <input type="checkbox" class="hidecol" value="created_at" id="col_7" />&nbsp;Intention&nbsp;
          <input type="checkbox" class="hidecol" value="reglement" id="col_8" />&nbsp;Annoncé le
          <input type="checkbox" class="hidecol" value="encaissement" id="col_9" />&nbsp;Célébrée le
          <input type="checkbox" class="hidecol" value="surplus" id="col_10" />&nbsp;Célébrant
          <input type="checkbox" class="hidecol" value="casuel" id="col_11" />&nbsp;Clocher
          <input type="checkbox" class="hidecol" value="surplus" id="col_12" />&nbsp;Commentaire
          <input type="checkbox" class="hidecol" value="casuel" id="col_13" />&nbsp;Modifié le
      </div>
      </div>


<div class="row">

  <div class="col">
    <div class="col-sm-9">

    <table class="table table-hover" id="emp_table">
        <thead>
            <br>
        <tr class="tr_header">
            <th scope="col">
                <a href="javascript:ajaxLoad('{{url('intentions/?field=created_at&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Date d'ajout</a>
                {{request()->session()->get('field')=='created_at'?(request()->session()->get('sort')=='asc'?'':''):''}}
            </th>
            <th scope="col">
                <a href="javascript:ajaxLoad('{{url('intentions/?field=reglement&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Reglement</a>
                {{request()->session()->get('field')=='reglement'?(request()->session()->get('sort')=='asc'?'':''):''}}
            </th>
            <th scope="col">
                <a href="javascript:ajaxLoad('{{url('intentions/?field=encaissement&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Offrande</a>
                {{request()->session()->get('field')=='encaissement'?(request()->session()->get('sort')=='asc'?'':''):''}}
            </th>
            <th scope="col">
                <a href="javascript:ajaxLoad('{{url('intentions/?field=surplus&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Surplus</a>
                {{request()->session()->get('field')=='surplus'?(request()->session()->get('sort')=='asc'?'':''):''}}
            </th>
            <th scope="col">
                <a href="javascript:ajaxLoad('{{url('intentions/?field=casuel&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Casuel</a>
                {{request()->session()->get('field')=='casuel'?(request()->session()->get('sort')=='asc'?'':''):''}}
            </th>

            <th scope="col">
                <a href="javascript:ajaxLoad('{{url('intentions/?field=personne_demandeuse&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Demandeur</a>
                {{request()->session()->get('field')=='personne_demandeuse'?(request()->session()->get('sort')=='asc'?'':''):''}}
            </th>

            <th scope="col">
                <a href="javascript:ajaxLoad('{{url('intentions/?field=intention&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Intention souhaitée</a>
                {{request()->session()->get('field')=='intention'?(request()->session()->get('sort')=='asc'?'':''):''}}
            </th>
            <th scope="col">
                <a href="javascript:ajaxLoad('{{url('intentions/?field=date_annoncee&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Annoncée le</a>
                {{request()->session()->get('field')=='date_annoncee'?(request()->session()->get('sort')=='asc'?'':''):''}}
            </th>
            <th scope="col">
                <a href="javascript:ajaxLoad('{{url('intentions/?field=date_celebree&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Célébrée le </a>
                {{request()->session()->get('field')=='date_celebree'?(request()->session()->get('sort')=='asc'?'':''):''}}
            </th>
            <th scope="col">
                <a href="javascript:ajaxLoad('{{url('intentions/?field=id_celebrants&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Célébrant</a>
                {{request()->session()->get('field')=='id_celebrants'?(request()->session()->get('sort')=='asc'?'':''):''}}
            </th>
            <th scope="col">
                <a href="javascript:ajaxLoad('{{url('intentions/?field=id_clochers&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Clocher</a>
                {{request()->session()->get('field')=='id_clochers'?(request()->session()->get('sort')=='asc'?'':''):''}}
            </th>
            <th scope="col">
              <a href="javascript:ajaxLoad('{{url('intentions/?field=commentaire&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Commentaire</a>
              {{request()->session()->get('field')=='commentaire'?(request()->session()->get('sort')=='asc'?'':''):''}}
            </th>
            <th scope="col">
              <a href="javascript:ajaxLoad('{{url('intentions/?field=updated_at&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Modifié le</a>
              {{request()->session()->get('field')=='updated_at'?(request()->session()->get('sort')=='asc'?'':''):''}}
            </th>
            <th scope="col">
              <!-- <a href="javascript:ajaxLoad('{{url('intentions/create')}}')" class="btn btn-outline-primary btn-sm"> <i class="fa fa-plus" aria-hidden="true"></i> Nouvelle intention</a> -->
              <a href="">Action</a>
            </th>
        </tr>
        </thead>
    </div>

    </div>


  </div>

  <tbody id="Table">


  <tr class="col">
  @foreach ($paroisse as $intention)
           <td> {{ $intention->created_at }} </td>
           <td> {{ $intention->reglement }} </td>
           <td> {{ $intention->encaissement }} </td>
           <td> {{ $intention->surplus }} </td>
           <td> {{ $intention->casuel }} </td>
           <td> {{ $intention->personne_demandeuse }} </td>
           <td> {{ $intention->intention }} </td>
           <td> {{ ($intention->date_annoncee ? date('d/m/Y', strtotime($intention->date_annoncee)) : '') }} </td>
           <td> {{ ($intention->date_celebree ? date('d/m/Y', strtotime($intention->date_celebree)) : '') }} </td>
           @if(isset($intention->celebrants->nom))
           <td> {{ $intention->celebrants->nom }} {{ $intention->celebrants->prenom }}</td>
           @else
           <td> Célébrant inconnu </td>
           @endif
           @if(isset($intention->clochers->nom))
           <td class="col-md-5"> {{ $intention->clochers->nom }} </td>
           @else
           @if(isset($intention->paroisse_origine))
           <td class="col-md-5">{{ $intention->paroisses->nom }}</td>
           @endif
           @endif
           <td> {{ $intention->commentaire }} </td>
           <td> {{ $intention->updated_at }} </td>
      <td>
          <div class="btn-group btn-group-sm" role="group">

          <a class="btn btn-warning" title="Edit"
             href="javascript:ajaxLoad('{{url('intentions/update/' .$intention->id)}}')"> <i class="fas fa-pencil-alt"></i>
              Modifier</a>
          </div>
      </td>
  </tr>
  @endforeach


  </tbody>
  </table>


  <script src="js/live-search.js"></script>
