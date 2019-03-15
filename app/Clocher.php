<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clocher extends Model
{


public $primaryKey = 'id_clocher';


 protected $fillable = [
     'nom','lieu','id_paroisses'
 ];

 public $timestamps = false;




public function paroisses() {
  return $this->belongsTo('App\Paroisse', 'id_paroisses');
}

public function intentions() {
  return $this->hasMany('App\Intention', 'id_clochers', 'id_clocher');
}

}
