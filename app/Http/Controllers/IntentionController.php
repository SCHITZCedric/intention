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
                             ->where('id_paroisses', '=', Auth::user()->id_paroisses)
                             ->orWhere('paroisse_destination', '=', $id_paroisse)
                             ->orderBy($request->session()->get('field'), $request->session()->get('sort'))
                             ->get();

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
      return view('accueil.addintention');


      $rules = [
        'casuel' => 'required',
        'intention' => 'required',
        'encaissement' => 'required',
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
      // $intention->date_souhaitee = $request->date_souhaitee;
      $intention->date_annoncee = $request->date_annoncee;
      $intention->personne_demandeuse = $request->personne_demandeuse;
      $intention->commentaire = $request->commentaire;
      $intention->id_clochers = $request->id_clochers;

      $intention->save();


      return redirect('/accueil');

  }

  public function update(Request $request, $id)
  {
      if ($request->isMethod('get'))
      return view('intention.editform', ['intention' => Intention::find($id)]);


      $rules = [
        'casuel' => 'required',
        'intention' => 'required',
        'encaissement' => 'required',
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
      // $intention->date_souhaitee = $request->date_souhaitee;
      $intention->date_annoncee = $request->date_annoncee;
      $intention->date_celebree = $request->date_celebree;
      $intention->id_clochers = $request->id_clochers;
      $intention->id_celebrants = $request->id_celebrants;
      $intention->personne_demandeuse = $request->personne_demandeuse;
      $intention->commentaire = $request->commentaire;

      $intention->save();


      return redirect('/intentions');
  }


public function export()
{
  return Excel::download(new IntentionsExport, 'intentions.xlsx');
}






}
