<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Celebrant;
use App\Intention;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ReglerComptableController extends Controller
{

  public function index(Request $request)
  {

    $reglers = new Celebrant();
          $reglers = $reglers->where('id_paroisses', '=', Auth::user()->id_paroisses)
                             ->orderBy('nom')
                             ->get();

          if ($request->ajax()) {
            return view('reglerComptable.index', compact('reglers'));
          } else {
            return view('reglerComptable.ajax', compact('reglers'));
          }
  }

  public function update(Request $request, $id)
  {

      $rules = [
        'payee' => '',
      ];

      $validator = Validator::make($request->all(), $rules);
      if ($validator->fails())
      return response()->json([
        'fail' =>true,
        'errors' => $validator->errors()
      ]);

      $celebrant = new Celebrant();
      $array = ($request->payee); // On récupère la valeur de la checkbox qui est l'id de l'intention que l'on souhaite update
      $regler = Intention::whereIn('id', $array);

      $regler->update([
        'payee' => 1,
        'id_celebrants' => $id,
    ]);

    return redirect('/comptable');
  }

  public function regler($id)
  {
    $reglerCelebrants = new Intention();

    $intentionList = $reglerCelebrants->where('id_celebrants', '=', $id)
                                      ->where('date_celebree', '!=', NULL)
                                      ->where('payee', '=', NULL)

                                      ->orWhere('id_celebrants', '=', NULL)
                                      ->where('date_celebree', '!=', NULL)
                                      ->where('payee', '=', NULL)

                                      ->orderBy('created_at')
                                      ->get();

    return view('reglerComptable.form', ['reglerCelebrants' => $intentionList ]);

  }


}
