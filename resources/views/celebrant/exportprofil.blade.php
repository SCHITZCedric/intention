<div class="container">
  <div class="col-sm-9">

        <table class="table table-hover">
            <thead>
                <br>

            <tr>
                <th scope="col"> <a>Demandeur</a> </th>
                <th scope="col"> <a>Type</a> </th>
                <th scope="col"> <a>Intention souhaitée</a> </th>
                <th scope="col"> <a>Clocher</a> </th>
                <th scope="col"> <a>Date annoncée</a> </th>
                <th scope="col"> <a>Date célébrée</a> </th>
            </tr>
            </thead>

<tbody>

  @foreach ($stats as $stat)
  <tr class="col">
    <td>{{$stat->personne_demandeuse}}</td>
    <td>{{$stat->casuel}}</td>
    <td>{{$stat->intention}}</td>
    @if(isset($stat->clochers->nom))
    <td> {{ $stat->clochers->nom }} </td>
    @else
    <td> Clocher inconnu </td>
    @endif
    <td>{{ ($stat->date_annoncee? date('d/m/Y', strtotime($stat->date_annoncee)) : '') }}</td>
    <td>{{ ($stat->date_celebree ? date('d/m/Y', strtotime($stat->date_celebree)) : '') }}</td>
  </tr>
  @endforeach


</tbody>
    </table>

    <table class="table table-hover">
        <thead>
            <br>

        <tr>
            <th scope="col"> <a>Montant des offrandes</a> </th>
            <th scope="col"> <a>Montant des offrandes (année)</a> </th>
            <th scope="col"> <a>Nombre de messes restantes</a> </th>
            <th scope="col"> <a>Nombre de binages</a> </th>
            <th scope="col"> <a>Nombre d'intention annoncée</a> </th>
            <th scope="col"> <a>Nombre d'intention annoncée (année)</a> </th>
            <th scope="col"> <a>Nombre d'intention célébrée</a> </th>
            <th scope="col"> <a>Nombre d'intention célébrée (année)</a> </th>
        </tr>
        </thead>

<tbody>
<tr class="col">
     <td> {{$montantOffrandeMois}} € </td>
     <td> {{$montantOffrandeAnnee}} €</td>
     <td> {{$nombreMesse->compteur_messe}}</td>
     <td> {{$nombreBinage->compteur_binage}} </td>
     <td> {{$nombreAnnonceeMois}} </td>
     <td> {{$nombreAnnonceeAnnee}}</td>
     <td> {{$nombreCelebreeMois}}</td>
     <td> {{$nombreCelebreeAnnee}} </td>
</tr>



</tbody>
</table>



</div>
</div>
