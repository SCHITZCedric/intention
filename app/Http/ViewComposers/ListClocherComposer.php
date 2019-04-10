<?php
namespace App\Http\ViewComposers;
use App\Clocher;
use App\Paroisse;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class ListClocherComposer
{

  function compose(View $view)
  {
    $id_paroisse = Auth::user()->id_paroisses;

    $view->with('ListClocher', Clocher::leftjoin('paroisses', 'id_paroisses', '=', 'paroisses.id')                                      
                                      ->where('id_dioceses', '=', Auth::user()->paroisses->id_dioceses)
                                      ->get()

    );
  }
}







 ?>
