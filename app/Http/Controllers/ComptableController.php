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
              $request->session()->put('field', $request
                      ->has('field') ? $request->get('field') : ($request->session()
                      ->has('field') ? $request->session()->get('field') : 'id'));

                      $request->session()->put('sort', $request
                              ->has('sort') ? $request->get('sort') : ($request->session()
                              ->has('sort') ? $request->session()->get('sort') : 'asc'));

    $id_paroisse =  Auth::user()->id_paroisses;

    $clochers = new Clocher();
    $intentions = new Intention();

      $paroisse = $intentions->leftjoin('clochers', 'id_clochers', '=', 'clochers.id_clocher')
                             ->where('id_paroisses', '=', $id_paroisse)
                             ->orWhere('paroisse_destination', '=', $id_paroisse)
                             ->orderBy($request->session()->get('field'), $request->session()->get('sort'))
                             ->get();





                              $first = $clochers->select('id_clocher')
                                                ->where('id_paroisses', '=', $id_paroisse)
                                                ->get();
                                                          $surplusTotal = $intentions->where('date_celebree', '=', NULL)
                                                                                     ->whereIn('id_clochers', $first)
                                                                                     ->orwhere('paroisse_destination', '=', $id_paroisse)
                                                                                     ->sum('surplus');


                if ($request->ajax()) {
                return view('comptable.index', compact('surplusTotal', 'paroisse'));
                  } else {
                  return view('comptable.ajax', compact('surplusTotal', 'paroisse'));
                }
    }


public function export()
{
  return Excel::download(new ComptableExport, 'intentions.xlsx');
}






}
