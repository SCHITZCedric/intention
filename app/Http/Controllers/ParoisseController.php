<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paroisse;
use App\Intention;
use App\Clocher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ParoisseController extends Controller
{

  public function index(Request $request)
  {

    $paroisses = new Paroisse();
          $paroisses = $paroisses->orderBy('lieu_paroisse')
                                 ->paginate(10);

          if ($request->ajax()) {
            return view('paroisse.index', compact('paroisses'));
          } else {
            return view('paroisse.ajax', compact('paroisses'));
          }
  }

  public function create(Request $request)
  {
      if ($request->isMethod('get'))
      return view('paroisse.form');

      $rules = [
        'nom_paroisse' => 'required',
        'lieu_paroisse' => 'required',

      ];

      $validator = Validator::make($request->all(), $rules);
      if ($validator->fails())
      return response()->json([
        'fail' =>true,
        'errors' => $validator->errors()
      ]);

      $paroisse = new Paroisse();
      $paroisse->nom_paroisse = $request->nom_paroisse;
      $paroisse->lieu_paroisse = $request->lieu_paroisse;



      $paroisse->save();

      return response()->json([
        'fail' => false,
        'redirect_url' => url('paroisses')
      ]);
  }

  public function update(Request $request, $id)
  {
      if ($request->isMethod('get'))
      return view('paroisse.form', ['paroisse' => paroisse::find($id)]);

      $rules = [
        'nom_paroisse' => 'required',
        'lieu_paroisse' => 'required',

      ];

      $validator = Validator::make($request->all(), $rules);
      if ($validator->fails())
      return response()->json([
        'fail' =>true,
        'errors' => $validator->errors()
      ]);

      $paroisse = Paroisse::find($id);
      $paroisse->nom_paroisse = $request->nom_paroisse;
      $paroisse->lieu_paroisse = $request->lieu_paroisse;




      $paroisse->save();

      return response()->json([
        'fail' => false,
        'redirect_url' => url('paroisses')
      ]);
  }

  public function destroy($id)
   {
       paroisse::destroy($id);
       return redirect('paroisses');
   }

   public function stats()
   {

     $id_paroisse = Auth::user()->id_paroisses;
        $moisCourant = date("n");
        $anneeCourant = date("Y");

        $intentions = new Intention();
        $clochers = new Clocher();

        $stats = $intentions->leftjoin('clochers', 'id_clochers', '=', 'clochers.id_clocher')
                            ->where('id_paroisses', '=', $id_paroisse)
                            ->orderBy('date_annoncee')
                            ->get();

       $montantOffrandeMois = $intentions->leftjoin('clochers', 'id_clochers', '=', 'clochers.id_clocher')
                                         ->where('id_paroisses', '=', $id_paroisse)
                                         ->where('date_celebree', '!=', null)
                                         ->whereMonth('date_celebree', '=', $moisCourant)
                                         ->whereYear('date_annoncee', '=', $anneeCourant)
                                         ->sum('encaissement');

      $montantOffrandeAnnee = $intentions->leftjoin('clochers', 'id_clochers', '=', 'clochers.id_clocher')
                                         ->where('id_paroisses', '=', $id_paroisse)
                                         ->where('date_celebree', '!=', null)
                                         ->whereYear('date_celebree', '=', $anneeCourant)
                                         ->sum('encaissement');

      $montantSurplusMois = $intentions->leftjoin('clochers', 'id_clochers', '=', 'clochers.id_clocher')
                                        ->where('id_paroisses', '=', $id_paroisse)
                                        ->where('date_celebree', '!=', null)
                                        ->whereMonth('date_celebree', '=', $moisCourant)
                                        ->whereYear('date_annoncee', '=', $anneeCourant)
                                        ->sum('surplus');

      $montantSurplusAnnee = $intentions->leftjoin('clochers', 'id_clochers', '=', 'clochers.id_clocher')
                                         ->where('id_paroisses', '=', $id_paroisse)
                                         ->where('date_celebree', '!=', null)
                                         ->whereYear('date_celebree', '=', $anneeCourant)
                                         ->sum('surplus');

      $nombreAnnonceeMois = $intentions->leftjoin('clochers', 'id_clochers', '=', 'clochers.id_clocher')
                          ->where('id_paroisses', '=', $id_paroisse)
                          ->where('date_annoncee', '!=', null)
                          ->whereMonth('date_annoncee', '=', $moisCourant)
                          ->whereYear('date_annoncee', '=', $anneeCourant)
                          ->where('date_celebree', '=', null)
                          ->count();

      $nombreAnnonceeAnnee = $intentions->leftjoin('clochers', 'id_clochers', '=', 'clochers.id_clocher')
                          ->where('id_paroisses', '=', $id_paroisse)
                          ->where('date_annoncee', '!=', null)
                          ->whereYear('date_annoncee', '=', $anneeCourant)
                          ->where('date_celebree', '=', null)
                          ->count();


      $nombreCelebreeMois = $intentions->leftjoin('clochers', 'id_clochers', '=', 'clochers.id_clocher')
                                       ->where('id_paroisses', '=', $id_paroisse)
                                       ->whereMonth('date_celebree', '=', $moisCourant)
                                       ->whereYear('date_annoncee', '=', $anneeCourant)
                                       ->where('date_celebree', '!=', null)
                                       ->count();

      $nombreCelebreeAnnee = $intentions->leftjoin('clochers', 'id_clochers', '=', 'clochers.id_clocher')
                                        ->where('id_paroisses', '=', $id_paroisse)
                                        ->whereYear('date_celebree', '=', $anneeCourant)
                                        ->where('date_celebree', '!=', null)
                                        ->count();

      $listeClocherChart = $clochers->where('id_paroisses', '=', $id_paroisse)
                                    ->get();


        return view('paroisse.statistiques', compact('stats', 'listeClocherChart',
                                                     'montantOffrandeMois', 'montantOffrandeAnnee',
                                                     'montantSurplusMois', 'montantSurplusAnnee',
                                                     'nombreAnnonceeMois', 'nombreAnnonceeAnnee',
                                                     'nombreCelebreeMois', 'nombreCelebreeAnnee'));



   }


}
