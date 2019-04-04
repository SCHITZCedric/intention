<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Celebrant;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class CelebrantController extends Controller
{

  public function index(Request $request)
  {

    $id_paroisse =  Auth::user()->id_paroisses;

    $celebrants = new Celebrant();
          $celebrants = $celebrants->where('id_paroisses', '=', $id_paroisse)
                                   ->paginate(10);

          if ($request->ajax()) {
            return view('celebrant.index', compact('celebrants'));
          } else {
            return view('celebrant.ajax', compact('celebrants'));
          }
  }

  public function create(Request $request)
  {
      if ($request->isMethod('get'))
      return view('celebrant.form');


      $rules = [
        'nom' => 'required',
        'prenom' => 'required',
        'en_service' => '',
        'compteur_messe' => '',
        'id_paroisses' => '',
        'id_statuts' => '',
      ];

      $validator = Validator::make($request->all(), $rules);
      if ($validator->fails())
      return response()->json([
        'fail' =>true,
        'errors' => $validator->errors()
      ]);

      $celebrant = new Celebrant();
      $celebrant->nom = $request->nom;
      $celebrant->prenom = $request->prenom;
      $celebrant->en_service = $request->en_service;
      $celebrant->compteur_messe = $request->compteur_messe;
      $celebrant->compteur_binage = 0;
      $celebrant->id_paroisses = $request->id_paroisses;
      $celebrant->id_statuts = $request->id_statuts;


      $celebrant->save();

      return response()->json([
        'fail' => false,
        'redirect_url' => url('celebrants')
      ]);
  }

  public function update(Request $request, $id)
  {
      if ($request->isMethod('get'))
      return view('celebrant.form', ['celebrant' => Celebrant::find($id)]);

      $rules = [
        'nom' => 'required',
        'prenom' => 'required',
        'en_service' => '',
        'compteur_messe' => '',
        'id_paroisses' => '',
        'id_statuts' => '',
      ];

      $validator = Validator::make($request->all(), $rules);
      if ($validator->fails())
      return response()->json([
        'fail' =>true,
        'errors' => $validator->errors()
      ]);

      $celebrant = Celebrant::find($id);
      $celebrant->nom = $request->nom;
      $celebrant->prenom = $request->prenom;
      $celebrant->en_service = $request->en_service;
      $celebrant->compteur_messe = $request->compteur_messe;
      $celebrant->id_paroisses = $request->id_paroisses;
      $celebrant->id_statuts = $request->id_statuts;

      $celebrant->save();

      return response()->json([
        'fail' => false,
        'redirect_url' => url('celebrants')
      ]);
  }

  public function destroy($id)
   {
       Celebrant::destroy($id);
       return redirect('celebrants');
   }



}
