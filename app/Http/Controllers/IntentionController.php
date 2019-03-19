<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\IntentionsExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Intention;
use App\Celebrant;
use App\Paroisse;
use App\Clocher;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class IntentionController extends Controller
{
  public function index(Request $request)
    {
      $request->session()->put('search', $request
              ->has('search') ? $request->get('search') : ($request->session()
              ->has('search') ? $request->session()->get('search') : ''));

              $request->session()->put('field', $request
                      ->has('field') ? $request->get('field') : ($request->session()
                      ->has('field') ? $request->session()->get('field') : 'id'));

                      $request->session()->put('sort', $request
                              ->has('sort') ? $request->get('sort') : ($request->session()
                              ->has('sort') ? $request->session()->get('sort') : 'asc'));

    $id_paroisse =  Auth::user()->id_paroisses;

    $clochers = new Clocher();
    $intentions = new Intention();

      $paroisse = $intentions->leftjoin('clochers', 'id_clochers', '=', 'clochers.id_clocher')
                             ->where('id_paroisses', '=', $id_paroisse)
                             ->where('intention', 'like', '%' . $request->session()->get('search') . '%')

                             ->orWhere('paroisse_destination', '=', $id_paroisse)
                             ->where('intention', 'like', '%' . $request->session()->get('search') . '%')

                             ->orWhere('paroisse_destination', '=', $id_paroisse)
                             ->where('casuel', 'like', '%' . $request->session()->get('search') . '%')

                             ->orwhere('id_paroisses', '=', $id_paroisse)
                             ->where('casuel', 'like', '%' . $request->session()->get('search') . '%')

                             ->orderBy($request->session()->get('field'), $request->session()->get('sort'))
                             ->paginate(5);





                              $first = $clochers->select('id_clocher')
                                                ->where('id_paroisses', '=', $id_paroisse)
                                                ->get();
                                                          $surplusTotal = $intentions->where('date_celebree', '=', NULL)
                                                                                     ->whereIn('id_clochers', $first)
                                                                                     ->orwhere('paroisse_destination', '=', $id_paroisse)
                                                                                     ->sum('surplus');


                if ($request->ajax()) {
                return view('intention.index', compact('surplusTotal', 'paroisse'));
                  } else {
                  return view('intention.ajax', compact('surplusTotal', 'paroisse'));
                }
    }



  public function create(Request $request)
  {
      if ($request->isMethod('get'))
      return view('intention.form');


      $rules = [
        'reglement' => 'required',
        'encaissement' => 'required',
        'casuel' => 'required',
        'intention' => 'required',
        'date_souhaitee' => 'required',
        'date_annoncee' => '',
        'id_clochers' => 'required'
      ];

      $validator = Validator::make($request->all(), $rules);
      if ($validator->fails())
      return response()->json([
        'fail' =>true,
        'errors' => $validator->errors()
      ]);
      $celebrant = new Celebrant();

      $intention = new Intention();
      $intention->reglement = $request->reglement;
      $intention->encaissement = 17;
      $intention->surplus = ($request->encaissement - 17);
      $intention->casuel = $request->casuel;
      $intention->intention = $request->intention;
      $intention->date_souhaitee = $request->date_souhaitee;
      $intention->date_annoncee = $request->date_annoncee;
      $intention->personne_demandeuse = $request->personne_demandeuse;
      $intention->commentaire = $request->commentaire;
      $intention->id_clochers = $request->id_clochers;

      $intention->save();

      return response()->json([
        'fail' => false,
        'redirect_url' => url('/intentions')
      ]);
  }

  public function update(Request $request, $id)
  {
      if ($request->isMethod('get'))
      return view('intention.editform', ['intention' => Intention::find($id)]);


      $rules = [
        'reglement' => 'required',
        'encaissement' => 'required',
        'casuel' => 'required',
        'intention' => 'required',
        'date_souhaitee' => 'required',
        'date_annoncee' => '',
        'date_celebree' => '',
        'id_clochers' => 'required',
        'id_celebrants' => '',
      ];

      $validator = Validator::make($request->all(), $rules);
      if ($validator->fails())
      return response()->json([
        'fail' =>true,
        'errors' => $validator->errors()
      ]);

      $intention = Intention::find($id);
      $intention->reglement = $request->reglement;
      $intention->encaissement = 17;
      $intention->surplus = ($request->encaissement - 17 );
      $intention->casuel = $request->casuel;
      $intention->intention = $request->intention;
      $intention->date_souhaitee = $request->date_souhaitee;
      $intention->date_annoncee = $request->date_annoncee;
      $intention->date_celebree = $request->date_celebree;
      $intention->id_clochers = $request->id_clochers;
      $intention->id_celebrants = $request->id_celebrants;

      $intention->save();

      return response()->json([
        'fail' => false,
        'redirect_url' => url('intentions')
      ]);
  }


public function export()
{
  return Excel::download(new IntentionsExport, 'intentions.xlsx');
}






}
