<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;

class UtilisateurController extends Controller
{

  public function index(Request $request)
  {
    $utilisateurs = new User();
          $utilisateurs = $utilisateurs->orderBy('nom')
                                       ->paginate(10);

          if ($request->ajax()) {
            return view('utilisateur.index', compact('utilisateurs'));
          } else {
            return view('utilisateur.ajax', compact('utilisateurs'));
          }
  }

  public function create(Request $request)
  {
      if ($request->isMethod('get'))
      return view('utilisateur.adduser');

      $rules = [
        'prenom' => 'required',
        'nom' => 'required',
        'email' => 'required',
        'password' => 'required',
        'id_paroisses' => 'required',
        'id_roles' => 'required',
      ];

      $validator = Validator::make($request->all(), $rules);
      if ($validator->fails())
      return response()->json([
        'fail' =>true,
        'errors' => $validator->errors()
      ]);

      $utilisateur = new User();
      $utilisateur->prenom = $request->prenom;
      $utilisateur->nom = $request->nom;
      $utilisateur->email = $request->email;
      $utilisateur->password = bcrypt($request->password);
      $utilisateur->id_paroisses = $request->id_paroisses;
      $utilisateur->id_roles = $request->id_roles;
      $utilisateur->id_celebrant = $request->id_celebrant;


      $utilisateur->save();

      return response()->json([
        'fail' => false,
        'redirect_url' => url('utilisateurs')
      ]);
  }

  public function update(Request $request, $id)
  {
      if ($request->isMethod('get'))
      return view('utilisateur.edituser', ['utilisateur' => User::find($id)]);

      $rules = [
        'prenom' => 'required',
        'nom' => 'required',
        'email' => 'required',
        'id_paroisses' => 'required',
        'id_roles' => 'required',
      ];

      $validator = Validator::make($request->all(), $rules);
      if ($validator->fails())
      return response()->json([
        'fail' =>true,
        'errors' => $validator->errors()
      ]);

      $utilisateur = User::find($id);
      $utilisateur->prenom = $request->prenom;
      $utilisateur->nom = $request->nom;
      $utilisateur->email = $request->email;
      $utilisateur->id_paroisses = $request->id_paroisses;
      $utilisateur->id_roles = $request->id_roles;
      $utilisateur->id_celebrant = $request->id_celebrant;


      $utilisateur->save();

      return response()->json([
        'fail' => false,
        'redirect_url' => url('utilisateurs')
      ]);
  }

  public function destroy($id)
   {
       User::destroy($id);
       return redirect('utilisateurs');
   }


}
