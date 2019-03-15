
<!-- Code permettant de récupérer le nombre de dimanche dans un mois et d'obtenir le nombre de messe possible pour un célébrant-->

 <?php


$moisActuel = date("n"); // On récupére le numéro du mois actuel (1 à 12)

$nbreJourMois = mktime( 0, 0, 0, $moisActuel, 1, 2019); // On récupére le nombre de jour maximum dans le mois actuel


$i=mktime(0,0,0,$moisActuel,1,2019);            // Date début de l'intervalle
$j=mktime(0,0,0,$moisActuel,date("t", $nbreJourMois),2019);  // Date de fin de l'intervalle

$pas=60*60*24;              //c'est 1 jour en time stamp
$fin=$i+(60*60*24*6);       //c'est une semaine.

// recherche du premier jour choisi de la période donnée
//si on tombe sur le bon, on sort de la boucle
for($deb=$i; $deb<= $fin; $deb+=$pas)
{
 if(date("N", $deb) == 7)
 {
 	$premier=$deb;
 	break;
 }
}
//ici, on a un pas de 7 jours pour tomber tout le temps sur le même jour de la semaine.
$pas=60*60*24*7;
//récupération de tous les jours choisis pour la période donnée
for($premier; $premier <= $j; $premier+=$pas) {
      $tableau[]= date("l", $premier);
}
$nbreDimanche = sizeof($tableau); // La taille du tableau est égale au nombre de dimanche dans le mois
$compteurMesse = date("t", $nbreJourMois) - $nbreDimanche; // On calcul donc le nombre de Messe que peut effectuer un curé
echo "Le compteur de messe est de " . $compteurMesse;

?>
