<?php
namespace App\Http\ViewComposers;
use App\Celebrant;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class ListCelebrantComposer
{

  public function compose(View $view)
  {
    $id_paroisse = Auth::user()->id_paroisses;

    $view->with('ListCelebrant', Celebrant::where('en_service', '!=', NULL)
                                          ->orderBy('id_paroisses', 'ASC')
                                          ->get()

  );
  }
}

 ?>
