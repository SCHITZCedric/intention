<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paroisse;
use Illuminate\Support\Facades\Validator;

class ParoisseController extends Controller
{

  public function index(Request $request)
  {
    $request->session()->put('search', $request
            ->has('search') ? $request->get('search') : ($request->session()
            ->has('search') ? $request->session()->get('search') : ''));
            //


    $paroisses = new Paroisse();
          $paroisses = $paroisses->where('nom', 'like', '%' . $request->session()->get('search') . '%')
                                 ->orWhere('lieu', 'like' , '%' . $request->session()->get('search') . '%')
                                 ->orderBy('lieu')
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
        'nom' => 'required',
        'lieu' => 'required',

      ];

      $validator = Validator::make($request->all(), $rules);
      if ($validator->fails())
      return response()->json([
        'fail' =>true,
        'errors' => $validator->errors()
      ]);

      $paroisse = new Paroisse();
      $paroisse->nom = $request->nom;
      $paroisse->lieu = $request->lieu;



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
        'nom' => 'required',
        'lieu' => 'required',

      ];

      $validator = Validator::make($request->all(), $rules);
      if ($validator->fails())
      return response()->json([
        'fail' =>true,
        'errors' => $validator->errors()
      ]);

      $paroisse = Paroisse::find($id);
      $paroisse->nom = $request->nom;
      $paroisse->lieu = $request->lieu;




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







     
     return view('paroisse.statistiques', compact(''));
   }


}
