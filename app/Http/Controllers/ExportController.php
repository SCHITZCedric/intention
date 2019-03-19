<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Intention;

class ExportController extends Controller
{
  public function export(Request $request)
  {
    $filterIntention = new Intention();


      if ($request->date_celebree != null) {

        $paroisse = $filterIntention->where('date_celebree', '=', $request->date_celebree)
                                    ->get();

                                        return view('export.ajax', compact('paroisse'));
      }

      if ($request->from_date && $request->to_date != null) {

        $paroisse = $filterIntention->whereBetween('date_celebree', [$request->from_date, $request->to_date])
                                      ->orderBy('date_celebree')
                                      ->get();

                                        return view('export.ajax', compact('paroisse'));


      }

      if ($request->id_celebrants != null) {

        $paroisse = $filterIntention->where('id_celebrants', '=', $request->id_celebrants)
                                    ->get();

                                        return view('export.ajax', compact('paroisse'));
      }

      if ($request->id_clochers != null) {

        $paroisse = $filterIntention->where('id_clochers', '=', $request->id_clochers)
                                    ->get();

                                        return view('export.ajax', compact('paroisse'));
      }


  }
}
?>
