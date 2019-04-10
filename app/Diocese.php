<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diocese extends Model
{
    public $primaryKey = 'id_diocese';

    protected $fillable = [
        'nom'
    ];

     public $timestamps = false;


     public function paroisses() {
       return $this->hasMany('App\Paroisse', 'id_dioceses');
     }

     // public function celebrants() {
     //   return $this->hasMany('App\Celebrant', 'id_dioceses', 'id_celebrant');
     // }

     public function users() {
       return $this->hasManyThrough('App\User', 'App\Paroisse', 'id_dioceses', 'id_paroisses');
     }

     public function celebrants()
     {
         return $this->hasManyThrough('App\Celebrant', 'App\Paroisse', 'id_dioceses', 'id_paroisses');
     }
}
