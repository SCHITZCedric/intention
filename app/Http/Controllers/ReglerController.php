<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Celebrant;
use App\Intention;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ReglerController extends Controller
{

  public function index(Request $request)
  {
    $request->session()->put('search', $request
            ->has('search') ? $request->get('search') : ($request->session()
            ->has('search') ? $request->session()->get('search') : ''));

    $reglers = new Celebrant();
          $reglers = $reglers->where('id_paroisses', '=', Auth::user()->id_paroisses)

                             ->where('nom', 'like', '%' . $request->session()->get('search') . '%')

                             ->orWhere('id_paroisses', '=', Auth::user()->id_paroisses)
                             ->where('prenom', 'like', '%' . $request->session()->get('search') . '%')

                             ->orderBy('nom')
                             ->get();

          if ($request->ajax()) {
            return view('regler.index', compact('reglers'));
          } else {
            return view('regler.ajax', compact('reglers'));
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
      $sizeArray = sizeof($array);
      $regler = Intention::whereIn('id', $array);

      while ($sizeArray > 0) {
          $compteur_messe_null = $celebrant->select('compteur_messe')
                                            ->where('id', '=', $id)
                                            ->first();

            if ($compteur_messe_null->compteur_messe == 0) {

              Celebrant::find($id)->increment('compteur_binage');

            } else  {
              Celebrant::find($id)->decrement('compteur_messe');
            }

          $sizeArray--;

      }
      $regler->update([
        'date_celebree' => date("y-m-d"),
        'id_celebrants' => $id,
    ]);

      return response()->json([
        'fail' => false,
        'redirect_url' => url('regler')
      ]);
  }

  public function regler($id)
  {
    $reglerCelebrants = new Intention();

    $intentionList = $reglerCelebrants->where('id_celebrants', '=', $id)
                                      ->where('date_celebree', '=', NULL)
                                      ->where('id_clochers', '!=', NULL)

                                      ->orWhere('id_celebrants', '=', NULL)
                                      ->where('date_celebree', '=', NULL)
                                      ->where('id_clochers', '!=', NULL)

                                      ->orderBy('created_at')
                                      ->get();

    return view('regler.form', ['reglerCelebrants' => $intentionList ]);

  }


}
