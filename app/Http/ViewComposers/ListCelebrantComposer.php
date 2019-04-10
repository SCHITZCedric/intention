<?php
namespace App\Http\ViewComposers;
use App\Celebrant;
use App\Paroisse;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class ListCelebrantComposer
{

  public function compose(View $view)
  {
    $id_paroisse = Auth::user()->id_paroisses;


    $view->with('ListCelebrant', Celebrant::leftjoin('paroisses', 'id_paroisses', '=', 'paroisses.id')
                                          ->where('en_service', '!=', NULL)
                                          ->where('id_dioceses', '=', Auth::user()->paroisses->id_dioceses)
                                          ->orderBy('id_paroisses', 'ASC')
                                          ->get()

  );
  }
}

 ?>
