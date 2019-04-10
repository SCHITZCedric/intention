<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paroisse extends Model
{
  protected $fillable = [
      'nom','lieu', 'id_dioceses'
  ];
   public $timestamps = false;

  public function clochers() {
    return $this->hasMany('App\Clocher', 'id_paroisses');
  }

  public function intentions() {
    return $this->hasManyThrough('App\Intention', 'App\Clocher', 'id_paroisses', 'id_clochers');
  }

  public function celebrants() {
    return $this->hasMany('App\Celebrant', 'id_paroisses');
  }

  public function users() {
    return $this->hasMany('App\User', 'id_paroisses');
  }

  public function dioceses() {
    return $this->belongsTo('App\Diocese', 'id_dioceses');
  }


}
