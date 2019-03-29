<?php

namespace App\Exports;

use App\Intention;
use App\Clocher;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ComptableExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
         //TODO Développer les conditions multiple



$id_paroisse =  Auth::user()->id_paroisses;

$clochers = new Clocher();
$intentions = new Intention();

$paroisse = $intentions->leftjoin('clochers', 'id_clochers', '=', 'clochers.id_clocher')
                  ->where('id_paroisses', '=', $id_paroisse)
                  ->orWhere('paroisse_destination', '=', $id_paroisse)
                  ->get();

                   $first = $clochers->select('id_clocher')
                                     ->where('id_paroisses', '=', $id_paroisse)
                                     ->get();
                                               $surplusTotal = $intentions->where('date_celebree', '=', NULL)
                                                                          ->whereIn('id_clochers', $first)
                                                                          ->orwhere('paroisse_destination', '=', $id_paroisse)
                                                                          ->sum('surplus');

         return view('export.index', compact('paroisse', 'surplusTotal'));

       }


    }
