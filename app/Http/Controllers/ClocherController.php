<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clocher;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ClocherController extends Controller
{

  public function index(Request $request)
  {

$id_paroisse = Auth::user()->id_paroisses;
    $clochers = new Clocher();
          $clochers = $clochers->where('id_paroisses', '=', $id_paroisse)
                                

              ->orderBy('lieu')
              ->paginate(10);

          if ($request->ajax()) {
            return view('clocher.index', compact('clochers'));
          } else {
            return view('clocher.ajax', compact('clochers'));
          }
  }

  public function create(Request $request)
  {
      if ($request->isMethod('get'))
      return view('clocher.form');

      $rules = [
        'nom' => 'required',
        'lieu' => 'required',
        'id_paroisses' => 'required',
      ];

      $validator = Validator::make($request->all(), $rules);
      if ($validator->fails())
      return response()->json([
        'fail' =>true,
        'errors' => $validator->errors()
      ]);

      $clocher = new Clocher();
      $clocher->nom = $request->nom;
      $clocher->lieu = $request->lieu;
      $clocher->id_paroisses = $request->id_paroisses;


      $clocher->save();

      return response()->json([
        'fail' => false,
        'redirect_url' => url('clochers')
      ]);
  }

  public function update(Request $request, $id)
  {
      if ($request->isMethod('get'))
      return view('clocher.form', ['clocher' => Clocher::find($id)]);

      $rules = [
        'nom' => 'required',
        'lieu' => 'required',
        'id_paroisses' => 'required',
      ];

      $validator = Validator::make($request->all(), $rules);
      if ($validator->fails())
      return response()->json([
        'fail' =>true,
        'errors' => $validator->errors()
      ]);

      $clocher = Clocher::find($id);
      $clocher->nom = $request->nom;
      $clocher->lieu = $request->lieu;
      $clocher->id_paroisses = $request->id_paroisses;



      $clocher->save();

      return response()->json([
        'fail' => false,
        'redirect_url' => url('clochers')
      ]);
  }

  public function destroy($id)
   {
       Clocher::destroy($id);
       return redirect('clochers');
   }


}
