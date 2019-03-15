<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statut extends Model
{
  public function celebrants() {
    return $this->hasMany('App\Celebrant', 'id_statuts');
  }
}
