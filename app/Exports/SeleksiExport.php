<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use App\Models\Seleksi;


class SeleksiExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View
    {
        return view('exports.seleksi', [
            'seleksi' => Seleksi::with('pendaftaran.santri')->get()
        ]);
    }
}
