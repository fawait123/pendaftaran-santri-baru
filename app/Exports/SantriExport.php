<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use App\Models\Santri;


class SantriExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View
    {
        return view('exports.santri', [
            'santri' => Santri::get()
        ]);
    }
}
