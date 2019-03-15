<?php

namespace App\Http\ViewComposers;
use App\Paroisse;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class ListParoisseComposer {

  function compose(View $view)
  {
    $id_paroisse = Auth::user()->id_paroisses;

    $view->with('ListParoisse', Paroisse::all()


    );
  }
}

 ?>
