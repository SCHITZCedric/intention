<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



use App\Exports\ProfilCelebrantExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Intention;
use App\Celebrant;


class ProfilController extends Controller
{
    public function index()
    {
      $id_user = Auth::user()->id;
      $moisCourant = date("n");
      $anneeCourant = date("Y");

      $intentions = new Intention();
      $celebrants = new Celebrant();

      $stats = $intentions->leftjoin('celebrants', 'id_celebrants', '=', 'celebrants.id_celebrant')
                          ->where('id_celebrants', '=', $id_user)
                          ->orderBy('date_annoncee')
                          ->get();

     $montantOffrandeMois = $intentions->leftjoin('celebrants', 'id_celebrants', '=', 'celebrants.id_celebrant')
                                       ->where('id_celebrants', '=', $id_user)
                                       ->where('date_celebree', '!=', null)
                                       ->whereMonth('date_celebree', '=', $moisCourant)
                                       ->whereYear('date_annoncee', '=', $anneeCourant)
                                       ->sum('encaissement');

    $montantOffrandeAnnee = $intentions->leftjoin('celebrants', 'id_celebrants', '=', 'celebrants.id_celebrant')
                                       ->where('id_celebrants', '=', $id_user)
                                       ->where('date_celebree', '!=', null)
                                       ->whereYear('date_celebree', '=', $anneeCourant)
                                       ->sum('encaissement');

    $nombreMesse = $celebrants->select('compteur_messe')
                              ->where('id_celebrant', '=', $id_user)
                              ->first();

    $nombreBinage = $celebrants->select('compteur_binage')
                               ->where('id_celebrant', '=', $id_user)
                               ->first();

    $nombreAnnonceeMois = $intentions->leftjoin('celebrants', 'id_celebrants', '=', 'celebrants.id_celebrant')
                        ->where('id_celebrants', '=', $id_user)
                        ->where('date_annoncee', '!=', null)
                        ->whereMonth('date_annoncee', '=', $moisCourant)
                        ->whereYear('date_annoncee', '=', $anneeCourant)
                        ->where('date_celebree', '=', null)
                        ->count();

    $nombreAnnonceeAnnee = $intentions->leftjoin('celebrants', 'id_celebrants', '=', 'celebrants.id_celebrant')
                        ->where('id_celebrants', '=', $id_user)
                        ->where('date_annoncee', '!=', null)
                        ->whereYear('date_annoncee', '=', $anneeCourant)
                        ->where('date_celebree', '=', null)
                        ->count();


    $nombreCelebreeMois = $intentions->leftjoin('celebrants', 'id_celebrants', '=', 'celebrants.id_celebrant')
                                     ->where('id_celebrants', '=', $id_user)
                                     ->whereMonth('date_celebree', '=', $moisCourant)
                                     ->whereYear('date_celebree', '=', $anneeCourant)
                                     ->where('date_celebree', '!=', null)
                                     ->count();

    $nombreCelebreeAnnee = $intentions->leftjoin('celebrants', 'id_celebrants', '=', 'celebrants.id_celebrant')
                                      ->where('id_celebrants', '=', $id_user)
                                      ->whereYear('date_celebree', '=', $anneeCourant)
                                      ->where('date_celebree', '!=', null)
                                      ->count();



    $calendar = $intentions->leftjoin('celebrants', 'id_celebrants', '=', 'celebrants.id_celebrant')
                            ->where('id_celebrants', '=', $id_user)
                            ->where('date_annoncee', '!=', null)
                            ->get();




      return view('celebrant.profil', compact('stats','calendar', 'montantOffrandeMois', 'montantOffrandeAnnee',
                                                       'nombreMesse', 'nombreBinage',
                                                       'nombreAnnonceeMois', 'nombreAnnonceeAnnee',
                                                       'nombreCelebreeMois', 'nombreCelebreeAnnee'));

    }

    public function export()
    {
      return Excel::download(new ProfilCelebrantExport, 'ProfilCelebrant.xlsx');
    }


    public function celebrer(Request $request)
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
        $array = ($request->celebrer); // On récupère la valeur de la checkbox qui est l'id de l'intention que l'on souhaite update
        $sizeArray = sizeof($array);
        $regler = Intention::whereIn('id', $array);
        $id = Auth::user()->id;

        while ($sizeArray > 0) {
            $compteur_messe_null = $celebrant->select('compteur_messe')
                                              ->where('id_celebrant', '=', $id)
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

        return redirect('/profil-celebrant');


    }

}
