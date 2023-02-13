<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DownloadRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\SantriExport;
use App\Exports\SeleksiExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Pendaftaran;
use App\Models\Seleksi;

class LaporanController extends Controller
{
    public function santri(Request $request)
    {
        return view('pages.admin.laporan.santri');
    }

    public function seleksi(Request $request)
    {
        return view('pages.admin.laporan.seleksi');
    }

    public function download(Request $request)
    {
        if($request->data=='santri'){
            return $this->downloadSantri($request);
        }else{
            return $this->downloadSeleksi($request);
        }
    }

    public function downloadSantri($request)
    {
        // return Excel::download(new SantriExport, 'laporan-data-santri.xlsx',\Maatwebsite\Excel\Excel::XLSX);
        $pendaftaran = Pendaftaran::with('santri')->get();
        $pdf = Pdf::loadView('pdf.data-santri',[
            'santri'=>$pendaftaran
        ]);
        return $pdf->download('data-penerimaan-santri-baru.pdf');
    }

    public function downloadSeleksi($request)
    {
        // dd($request->all());
        // return Excel::download(new SeleksiExport, 'laporan-data-seleksi.xlsx',\Maatwebsite\Excel\Excel::XLSX);
        $pendaftaran = Seleksi::where('status',$request->status)->with('pendaftaran.santri')->get();
        $pdf = Pdf::loadView('pdf.seleksi',[
            'seleksi'=>$pendaftaran
        ]);
        return $pdf->download('data-seleksi-santri-baru.pdf');
    }
}
