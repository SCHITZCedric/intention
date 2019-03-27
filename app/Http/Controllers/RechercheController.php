<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Intention;

class RechercheController extends Controller
{
  public function filter(Request $request)
  {
    $filterIntention = new Intention();
      if ($request->date_celebree != null) {
        $paroisse = $filterIntention->where('date_celebree', '=', $request->date_celebree)
                                    ->get();

                                    $surplusTotal = $filterIntention->where('date_celebree', '=', NULL)
                                                                    ->where('date_celebree', '=', $request->date_celebree)
                                                                    ->sum('surplus');


                                      return view('filterIntention.ajax', compact('paroisse', 'surplusTotal'));
      }
      if ($request->from_date && $request->to_date != null) {
        $paroisse = $filterIntention->whereBetween('date_celebree', [$request->from_date, $request->to_date])
                                      ->orderBy('date_celebree')
                                      ->get();

                                      $surplusTotal = $filterIntention->where('date_celebree', '=', NULL)
                                                                      ->whereBetween('date_celebree', [$request->from_date, $request->to_date])
                                                                      ->sum('surplus');

                                        return view('filterIntention.ajax', compact('paroisse', 'surplusTotal'));
      }
      if ($request->id_celebrants != null) {
        $id_cele = $request->id_celebrants;
        $paroisse = $filterIntention->where('id_celebrants', '=', $id_cele)
                                    ->get();

                                    $surplusTotal = $filterIntention->where('date_celebree', '=', NULL)
                                                                    ->where('id_celebrants', '=', $id_cele)
                                                                    ->sum('surplus');


                                      return view('filterIntention.ajax', compact('paroisse', 'surplusTotal'));
      }
      if ($request->id_clochers != null) {
        $id_clo = $request->id_clochers;
        $paroisse = $filterIntention->where('id_clochers', '=', $request->id_clochers)
                                    ->get();

                                    $surplusTotal = $filterIntention->where('date_celebree', '=', NULL)
                                                                    ->where('id_clochers', '=', $id_clo)
                                                                    ->sum('surplus');
                                        return view('filterIntention.ajax', compact('paroisse', 'surplusTotal'));
      }



      // if ($request->ajax()) {
      //   $id_cele = $request->id_celebrants;
      //
      //
      //   $request->session()->put('search', $request
      //           ->has('search') ? $request->get('search') : ($request->session()
      //           ->has('search') ? $request->session()->get('search') : ''));
      //
      //           $request->session()->put('field', $request
      //                   ->has('field') ? $request->get('field') : ($request->session()
      //                   ->has('field') ? $request->session()->get('field') : 'id'));
      //
      //                   $request->session()->put('sort', $request
      //                           ->has('sort') ? $request->get('sort') : ($request->session()
      //                           ->has('sort') ? $request->session()->get('sort') : 'asc'));
      //
      //
      //   $paroisse = $filterIntention->where('id_celebrants', '=', $id_cele)
      //                               ->where('intention', 'like', '%' . $request->session()->get('search') . '%')
      //
      //                               ->orWhere('id_celebrants', '=', $id_cele)
      //                               ->where('personne_demandeuse', 'like', '%' . $request->session()->get('search') . '%')
      //
      //
      //                               ->orderBy($request->session()->get('field'), $request->session()->get('sort'))
      //                               ->get();
      //
      // return view('filterIntention.index', compact('paroisse'));
      //   } else {
      //   return view('filterIntention.ajax', compact('paroisse'));
      // }
  }
}
?>
