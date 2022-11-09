<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pendidikan;
use App\Models\Pendaftaran;
use App\Models\Santri;
use App\Http\Requests\PendaftaranRequest;
use App\Http\Requests\FormulirRequest;

class DataPendaftarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.pendaftar.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenjang = Pendidikan::all();
        return view('pages.admin.pendaftar.create',compact('jenjang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

            return redirect()->route('admin.pendaftar.index')->with('success','Pendaftaran Santri Baru Berhasil');
        }catch(Exception $error){
            return redirect()->route('admin.pendaftar.index')->with('error',$error->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pendaftaran = Pendaftaran::with('santri')->find($id);
        $jenjang = Pendidikan::all();
        if($pendaftaran){
            return view('pages.admin.pendaftar.edit',compact('pendaftaran','jenjang'));
        }
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PendaftaranRequest $request, $id)
    {
        $check = Pendaftaran::find($id);
        if($check){
            Santri::where('id',$check->santri_id)->update([
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
                'gol_darah'=> $request->gol_darah
              ]);
        return redirect()->route('admin.pendaftar.index')->with(['message'=>'Update berhasil']);
    }
    return redirect()->route('admin.pendaftar.index')->with(['message'=>'Upss error']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pendaftaran = Pendaftaran::with('santri')->find($id);
        if($pendaftaran){
            $pendaftaran->delete();
            return redirect()->route('admin.pendaftar.index')->with(['message'=>'Delete berhasil']);
        }

        return redirect()->route('admin.pendaftar.index')->with(['message'=>'Upss error']);
    }

    public function detail($id)
    {
        $pendaftaran = Pendaftaran::with('santri')->find($id);
        if($pendaftaran){
            return view('pages.admin.pendaftar.detail',compact('pendaftaran'));
        }
        return abort(404);
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
