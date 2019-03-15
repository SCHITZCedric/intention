<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Celebrant extends Model
{

  //protected $table = 'celebrants';
 protected $fillable = ['nom','prenom','en_service', 'compteur_messe', 'compteur_binage', 'id_paroisses', 'id_statuts'];

 public $timestamps = false;

 public function intentionReview() {
   return $this->hasMany('App\Intention', 'id_celebrants');
 }


 public function paroisses() {
   return $this->belongsTo('App\Paroisse', 'id_paroisses');
 }

 public function statuts() {
   return $this->belongsTo('App\Statut', 'id_statuts');
 }

}
