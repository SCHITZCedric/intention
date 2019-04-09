<?php

namespace App\Http\ViewComposers;
use App\Paroisse;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class ListParoisseComposer {

  function compose(View $view)
  {


    $view->with('ListParoisse', Paroisse::all()


    );
  }
}

 ?>
