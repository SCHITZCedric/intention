<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intention extends Model
{
 protected $fillable = [
     'reglement','encaissement', 'surplus', 'casuel', 'intention', 'date_souhaitee', 'date_annoncee', 'date_celebree', 'paroisse_origine', 'paroisse_destination', 'id_celebrants' , 'id_clochers'
 ];

 public function clochers() {
   return $this->belongsTo('App\Clocher', 'id_clochers', 'id_clocher');
 }

 public function celebrants() {
   return $this->belongsTo('App\Celebrant', 'id_celebrants');
 }

 public function paroisses() {
   return $this->belongsTo('App\Paroisse', 'paroisse_origine');
 }

 protected $dates = [
   'created_at',
   'updated_at',
   'deleted_at'
   // 'date_annoncee',
   // 'date_celebree',
   // 'date_souhaitee'
];

}
