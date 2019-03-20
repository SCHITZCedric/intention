<?php

namespace App\Exports;

use App\Intention;
use App\Celebrant;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfilCelebrantExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
         //TODO Développer les conditions multiple

         $id_user = Auth::user()->id;
         $moisCourant = date("n");
         $anneeCourant = date("Y");

         $intentions = new Intention();
         $celebrants = new Celebrant();

         $stats = $intentions->leftjoin('celebrants', 'id_celebrants', '=', 'celebrants.id')
                             ->where('id_celebrants', '=', $id_user)
                             ->orderBy('date_annoncee')
                             ->get();

        $montantOffrandeMois = $intentions->leftjoin('celebrants', 'id_celebrants', '=', 'celebrants.id')
                                          ->where('id_celebrants', '=', $id_user)
                                          ->whereMonth('date_celebree', '=', $moisCourant)
                                          ->sum('encaissement');

       $montantOffrandeAnnee = $intentions->leftjoin('celebrants', 'id_celebrants', '=', 'celebrants.id')
                                          ->where('id_celebrants', '=', $id_user)
                                          ->whereYear('date_celebree', '=', $anneeCourant)
                                          ->sum('encaissement');

       $nombreMesse = $celebrants->select('compteur_messe')
                                 ->where('id', '=', $id_user)
                                 ->first();

       $nombreBinage = $celebrants->select('compteur_binage')
                                  ->where('id', '=', $id_user)
                                  ->first();

       $nombreAnnonceeMois = $intentions->leftjoin('celebrants', 'id_celebrants', '=', 'celebrants.id')
                           ->where('id_celebrants', '=', $id_user)
                           ->where('date_annoncee', '!=', null)
                           ->whereMonth('date_annoncee', '=', $moisCourant)
                           ->where('date_celebree', '=', null)
                           ->count();

       $nombreAnnonceeAnnee = $intentions->leftjoin('celebrants', 'id_celebrants', '=', 'celebrants.id')
                           ->where('id_celebrants', '=', $id_user)
                           ->where('date_annoncee', '!=', null)
                           ->whereYear('date_annoncee', '=', $anneeCourant)
                           ->where('date_celebree', '=', null)
                           ->count();


       $nombreCelebreeMois = $intentions->leftjoin('celebrants', 'id_celebrants', '=', 'celebrants.id')
                                        ->where('id_celebrants', '=', $id_user)
                                        ->whereMonth('date_celebree', '=', $moisCourant)
                                        ->where('date_celebree', '!=', null)
                                        ->count();

       $nombreCelebreeAnnee = $intentions->leftjoin('celebrants', 'id_celebrants', '=', 'celebrants.id')
                                         ->where('id_celebrants', '=', $id_user)
                                         ->whereYear('date_celebree', '=', $anneeCourant)
                                         ->where('date_celebree', '!=', null)
                                         ->count();








         return view('celebrant.exportprofil', compact('stats', 'montantOffrandeMois', 'montantOffrandeAnnee',
                                                          'nombreMesse', 'nombreBinage',
                                                          'nombreAnnonceeMois', 'nombreAnnonceeAnnee',
                                                          'nombreCelebreeMois', 'nombreCelebreeAnnee'));

       }


    }
