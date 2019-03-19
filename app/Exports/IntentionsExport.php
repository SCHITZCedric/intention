<?php

namespace App\Exports;

use App\Intention;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

use Illuminate\Http\Request;

class IntentionsExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(Request $request): View
    {
        return view('export.index', [
            'paroisse' => Intention::where('id_clochers', '=', $request->id_clochers)
            ->get()

        ]);
    }
}
