<?php
namespace App\Providers;

use App\Role;
use Illuminate\Support\ServiceProvider;

/**
 *
 */
class ListRoleProvider extends ServiceProvider
{

  function boot()
  {
    view()->composer('*', function($view){

      $view->with('ListRole', Role::all());
    });
  }
}


 ?>
