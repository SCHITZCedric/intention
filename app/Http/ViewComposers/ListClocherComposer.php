<?php
namespace App\Http\ViewComposers;
use App\Clocher;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class ListClocherComposer
{

  function compose(View $view)
  {
    $id_paroisse = Auth::user()->id_paroisses;

    $view->with('ListClocher', Clocher::where('id_paroisses', '=', $id_paroisse)
                                      ->get()

    );
  }
}







 ?>
