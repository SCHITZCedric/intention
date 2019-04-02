<?php

namespace App\Exports;

use App\Intention;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class IntentionsExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
         //TODO Développer les conditions multiple
                $id_clochers = request()->input('id_clochers');
                $id_celebrants = request()->input('id_celebrants');

                $date_celebree = request()->input('date_celebree');

                $casuel = request()->input('casuel');
                $etat = request()->input('etat');

                $from_date = request()->input('from_date');
                $to_date = request()->input('to_date');

                $id_paroisse =  Auth::user()->id_paroisses;

                if ($id_clochers != null) {

                    return view('export.index', [
                        'paroisse' => Intention::leftjoin('clochers', 'id_clochers', '=', 'clochers.id_clocher')
                                                ->where('id_paroisses', '=', $id_paroisse)
                                                ->where('id_clochers', '=', $id_clochers)
                                                ->get()

                    ]);

                }

                if ($id_celebrants != null) {

                    return view('export.index', [
                        'paroisse' => Intention::leftjoin('clochers', 'id_clochers', '=', 'clochers.id_clocher')
                                                ->where('id_paroisses', '=', $id_paroisse)
                                                ->where('id_celebrants', '=', $id_celebrants)
                                                ->get()

                    ]);

                }

                if ($date_celebree != null) {

                    return view('export.index', [
                        'paroisse' => Intention::leftjoin('clochers', 'id_clochers', '=', 'clochers.id_clocher')
                                                ->where('id_paroisses', '=', $id_paroisse)
                                                ->where('date_celebree', '=', $date_celebree)
                                                ->get()

                    ]);

                }

                if ($from_date && $to_date != null) {

                    return view('export.index', [
                        'paroisse' => Intention::leftjoin('clochers', 'id_clochers', '=', 'clochers.id_clocher')
                                                ->where('id_paroisses', '=', $id_paroisse)
                                                ->whereBetween('date_celebree', [$from_date, $to_date])
                                                ->orderBy('date_celebree')
                                                ->get()

                    ]);

              }

              if ($casuel != null) {

                  return view('export.index', [
                      'paroisse' => Intention::leftjoin('clochers', 'id_clochers', '=', 'clochers.id_clocher')
                                             ->where('id_paroisses', '=', $id_paroisse)
                                             ->where('id_paroisses', '=', $id_paroisse)
                                             ->where('casuel', '=', $casuel)
                                             ->get()

                  ]);

              }

              if ($etat == 1) {

                  return view('export.index', [
                      'paroisse' => Intention::leftjoin('clochers', 'id_clochers', '=', 'clochers.id_clocher')
                                             ->where('id_paroisses', '=', $id_paroisse)
                                             ->where('date_annoncee', '!=', null)
                                             ->where('date_celebree', '=', null)
                                             ->get()

                  ]);

              }

              if ($etat == 2) {

                  return view('export.index', [
                      'paroisse' => Intention::leftjoin('clochers', 'id_clochers', '=', 'clochers.id_clocher')
                                             ->where('id_paroisses', '=', $id_paroisse)
                                             ->where('date_celebree', '!=', null)
                                             ->get()

                  ]);

              }
    }
}
