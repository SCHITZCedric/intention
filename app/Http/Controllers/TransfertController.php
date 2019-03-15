<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paroisse;
use App\Intention;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class TransfertController extends Controller
{

  public function index(Request $request)
  {
    $request->session()->put('search', $request
            ->has('search') ? $request->get('search') : ($request->session()
            ->has('search') ? $request->session()->get('search') : ''));

    $transfert = new Paroisse();
          $transfert = $transfert->where('id', '!=', Auth::user()->id_paroisses)
                                ->where('nom', 'like', '%' . $request->session()->get('search') . '%')


                                ->orWhere('id', '!=', Auth::user()->id_paroisses)
                                ->where('lieu', 'like', '%' . $request->session()->get('search') . '%')
                                ->get();

          if ($request->ajax()) {
            return view('transfert.index', compact('transfert'));
          } else {
            return view('transfert.ajax', compact('transfert'));
          }
  }

  public function update(Request $request, $id)
  {
      $id_origine = Auth::user()->id_paroisses;

      $rules = [
        'payee' => '',
      ];

      $validator = Validator::make($request->all(), $rules);
      if ($validator->fails())
      return response()->json([
        'fail' =>true,
        'errors' => $validator->errors()
      ]);


      $array = ($request->payee); // On récupère la valeur de la checkbox qui est l'id de l'intention que l'on souhaite update
      $transfert = Intention::whereIn('id', $array);
      $transfert->update([
        'id_clochers' => null,
        'paroisse_origine' => $id_origine,
        'paroisse_destination' => $id,
    ]);

      return response()->json([
        'fail' => false,
        'redirect_url' => url('transfert')
      ]);
  }

  public function transfert($id)
  {

    $id_paroisse =  Auth::user()->id_paroisses;
    $transfertCelebrants = new Intention();

    $intentionList = $transfertCelebrants->leftjoin('clochers', 'id_clochers', '=', 'clochers.id_clocher')
                                         ->where('date_celebree', '=', NULL)
                                         ->where('id_clochers', '!=', NULL)
                                         ->where('id_paroisses', '=', $id_paroisse)



                                      ->orderBy('created_at')
                                      ->get();

    return view('transfert.form', ['transfertCelebrants' => $intentionList ]);

  }


}
