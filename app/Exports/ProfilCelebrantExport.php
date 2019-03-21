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

         $from_date = request()->input('from_date');
         $to_date = request()->input('to_date');

         $intentions = new Intention();
         $celebrants = new Celebrant();

         $stats = $intentions->leftjoin('celebrants', 'id_celebrants', '=', 'celebrants.id')
                             ->where('id_celebrants', '=', $id_user)
                             ->whereBetween('created_at', [$from_date, $to_date])
                             ->orderBy('date_annoncee')
                             ->get();

        $montantOffrandeMois = $intentions->leftjoin('celebrants', 'id_celebrants', '=', 'celebrants.id')
                                          ->where('id_celebrants', '=', $id_user)
                                          ->whereMonth('date_celebree', '=', $moisCourant)
                                          ->whereBetween('created_at', [$from_date, $to_date])
                                          ->sum('encaissement');

       $montantOffrandeAnnee = $intentions->leftjoin('celebrants', 'id_celebrants', '=', 'celebrants.id')
                                          ->where('id_celebrants', '=', $id_user)
                                          ->whereYear('date_celebree', '=', $anneeCourant)
                                          ->whereBetween('created_at', [$from_date, $to_date])
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
                           ->whereBetween('created_at', [$from_date, $to_date])
                           ->where('date_celebree', '=', null)
                           ->count();

       $nombreAnnonceeAnnee = $intentions->leftjoin('celebrants', 'id_celebrants', '=', 'celebrants.id')
                           ->where('id_celebrants', '=', $id_user)
                           ->where('date_annoncee', '!=', null)
                           ->whereYear('date_annoncee', '=', $anneeCourant)
                           ->whereBetween('created_at', [$from_date, $to_date])
                           ->where('date_celebree', '=', null)
                           ->count();


       $nombreCelebreeMois = $intentions->leftjoin('celebrants', 'id_celebrants', '=', 'celebrants.id')
                                        ->where('id_celebrants', '=', $id_user)
                                        ->whereMonth('date_celebree', '=', $moisCourant)
                                        ->whereBetween('created_at', [$from_date, $to_date])
                                        ->where('date_celebree', '!=', null)
                                        ->count();

       $nombreCelebreeAnnee = $intentions->leftjoin('celebrants', 'id_celebrants', '=', 'celebrants.id')
                                         ->where('id_celebrants', '=', $id_user)
                                         ->whereYear('date_celebree', '=', $anneeCourant)
                                         ->whereBetween('created_at', [$from_date, $to_date])
                                         ->where('date_celebree', '!=', null)
                                         ->count();








         return view('celebrant.exportprofil', compact('stats', 'montantOffrandeMois', 'montantOffrandeAnnee',
                                                          'nombreMesse', 'nombreBinage',
                                                          'nombreAnnonceeMois', 'nombreAnnonceeAnnee',
                                                          'nombreCelebreeMois', 'nombreCelebreeAnnee'));

       }


    }
