
<script src="{{ asset('/js/app.js') }}" defer></script>

<div class="container">
    <div class="row">
            <div class="col-sm-7">
              <h3>Liste des intentions trouvées</h3>
            </div>
            <div class="col-sm-5">
              <div class="pull-right">
                <div class="input-group">
                    <input class="form-control mr-sm-2" id="search"
                           value="{{ request()->session()->get('search') }}"
                           onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('recherche/resultat/')}}?search='+this.value)"
                           placeholder="Rechercher une intention..." name="search"
                           type="search"/>
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-secondary"
                                onclick="ajaxLoad('{{url('recherche/resultat/')}}?search='+$('#search').val())">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
              </div>
        </div>
    </div>
</div>





<div class="container">
  <div class="col-sm-9">

        <table class="table table-hover">
            <thead>
                <br>
            <tr>
                <th scope="col"> <a>Date d'ajout</a> </th>
                <th scope="col"> <a>Reglement</a> </th>
                <th scope="col"> <a>Encaissement</a> </th>
                <th scope="col"> <a>Surplus</a> </th>
                <th scope="col"> <a>Type d'intention</a> </th>
                <th scope="col"> <a>Personne bénéficiaire</a> </th>
                <th scope="col"> <a>Date souhaitée</a> </th>
                <th scope="col"> <a>Date annoncée</a> </th>
                <th scope="col"> <a>Date célébrée</a> </th>
                <th scope="col"> <a>Célébrant</a> </th>
                <th scope="col"> <a>Clocher</a> </th>
                <th scope="col"> <a>Modifié le</a> </th>
            </tr>
            </thead>
      </div>

  </div>
  </div>
</div>




<tbody>


<tr class="col">
@foreach ($paroisse as $intention)
         <td> {{ $intention->created_at }} </td>
         <td> {{ $intention->reglement }} </td>
         <td> {{ $intention->encaissement }} </td>
         <td> {{ $intention->surplus }} </td>
         <td> {{ $intention->casuel }} </td>
         <td> {{ $intention->intention }} </td>
         <td> {{ ($intention->date_souhaitee ? date('d/m/Y', strtotime($intention->date_souhaitee)) : '') }} </td>
         <td> {{ ($intention->date_annoncee ? date('d/m/Y', strtotime($intention->date_annoncee)) : '') }} </td>
         <td> {{ ($intention->date_celebree ? date('d/m/Y', strtotime($intention->date_celebree)) : '') }} </td>
         @if(isset($intention->celebrants->nom))
         <td> {{ $intention->celebrants->nom }} {{ $intention->celebrants->prenom }}</td>
         @else
         <td> Célébrant inconnu </td>
         @endif
         @if(isset($intention->clochers->nom))
         <td> {{ $intention->clochers->nom }} </td>
         @else
         <td> Intention transféré </td>
         @endif
         <td> {{ $intention->updated_at }} </td>
    <td>
        <div class="btn-group btn-group-sm" role="group">

        <a class="btn btn-warning" title="Edit"
           href="javascript:ajaxLoad('{{url('/recherche/resultat/update/'.$intention->id)}}')"> <i class="fas fa-pencil-alt"></i>
            Modifier</a>
        </div>
    </td>
</tr>
@endforeach


</tbody>
    </table>



</div>
