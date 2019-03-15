<?php
namespace App\Providers;

use App\Statut;
use Illuminate\Support\ServiceProvider;

/**
 *
 */
class ListStatutProvider extends ServiceProvider
{

  function boot()
  {
    view()->composer('*', function($view){

      $view->with('ListStatut', Statut::all());
    });
  }
}


 ?>
