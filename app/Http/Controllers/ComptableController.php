<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\ComptableExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Intention;
use App\Clocher;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class ComptableController extends Controller
{
  public function index(Request $request)
    {

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


                return view('comptable.index', compact('surplusTotal', 'paroisse'));
    }


public function export()
{
  return Excel::download(new ComptableExport, 'intentions.xlsx');
}






}
