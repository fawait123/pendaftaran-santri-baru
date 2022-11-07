<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormulirRequest;
use App\Models\Pendaftaran;
use App\Models\Pendidikan;
use App\Models\Santri;
use Exception;
use Illuminate\Http\Request;
use Throwable;

class FormulirController extends Controller
{
    public function index()
    {
        $jenjang = Pendidikan::all();
        $pendaftaran = Pendaftaran::where('user_id',auth()->user()->id)->first();
        $is_true = false;
        if($pendaftaran){
            $is_true = true;
        }
        return view('pages.formulir.index',compact('jenjang','is_true','pendaftaran'));
    }


    public function store(FormulirRequest $request)
    {
        try{
            $santri = Santri::create([
              "no_urut"=>$this->no_urut(),
              "nama_lengkap" => $request->nama_lengkap,
              "tempat_lahir" => $request->tempat_lahir,
              "tgl_lahir" => date('Y-m-d',strtotime($request->tgl_lahir)),
              "jenis_kelamin" => $request->jenis_kelamin,
              "berat_badan" => $request->berat_badan,
              "tinggi_badan" => $request->tinggi_badan,
              "alamat" => $request->alamat,
              "asal_sekolah" => $request->asal_sekolah,
              "jenjang_pendidikan_id" => $request->jenjang_pend,
              "hobi" => $request->hobi,
              "anak_ke" => $request->anak_ke,
              "no_kk" => $request->no_kk,
              "nik" => $request->nik,
              "no_hp" => $request->no_hp,
              "email" => $request->email,
              "nik_ayah" => $request->nik_ayah,
              "nama_ayah" => $request->nama_ayah,
              "pekerjaan_ayah" => $request->pekerjaan_ayah,
              "nik_ibu" => $request->nik_ibu,
              "nama_ibu" => $request->nama_ibu,
              "pekerjaan_ibu" => $request->pekerjaan_ibu,
              "foto" => $this->convertTobase64($request->file('foto')),
              "fc_kk" => $this->convertTobase64($request->file('fc_kk')),
              "fc_akta" => $this->convertTobase64($request->file('fc_akta')),
              'gol_darah'=> $request->gol_darah
            ]);

            Pendaftaran::create([
                'santri_id'=>$santri->id,
                'no_daftar'=>$this->getNoPendaftaran(),
                'tgl_daftar'=>date('Y-m-d'),
                'thn_daftar'=>date('Y'),
                'user_id'=>auth()->user()->id
            ]);

            return redirect()->route('formulir.index')->with('success','Pendaftaran Santri Baru Berhasil');
        }catch(Exception $error){
            // return redirect()->route('formulir.index')->with('error',$error->getMessage());
            dd($error->getMessage());
        }
    }

    public function convertTobase64($image)
    {
        $encode = file_get_contents($image->path());
        $mimeType = $image->getMimeType();
        $base64 = base64_encode($encode);
        $dataURL = 'data:'.$mimeType.';base64,'.$base64;
        return $dataURL;
    }

    public function getNoPendaftaran()
    {
        $count = Pendaftaran::count();
        $count++;
        $no_pendaftaran = 'PNDF-'.date('YmdHis').$count;
        return $no_pendaftaran;
    }

    public function no_urut()
    {
        $count = Santri::count();
        $count++;
        $no_urut = 'SN-'.date('YmdHis').$count;
        return $no_urut;
    }
}
