<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SeleksiRequest;
use App\Models\Seleksi;
use App\Models\Pendaftaran;
use App\Models\Notifkasi;

class SeleksiController extends Controller
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
        return view('pages.admin.seleksi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pendaftaran = Pendaftaran::with('santri')->get();
        return view('pages.admin.seleksi.create',compact('pendaftaran'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SeleksiRequest $request)
    {
        $total = ($request->nilai_baca_alquran + $request->nilai_tulis_arab + $request->nilai_wawancara) / 3;
        Seleksi::create([
            'no_seleksi'=>$this->IDSeleksi(),
            'pendaftaran_id' => $request->pendaftaran_id,
            'nilai_baca_alquran' => $request->nilai_baca_alquran,
            'nilai_wawancara'=>$request->nilai_wawancara,
            'nilai_tulis_arab' => $request->nilai_tulis_arab,
            'total_penilaian' => $total,
            'kamar' => $request->kamar,
            'keterangan' => $request->keterangan,
            'kelas' =>$request->kelas,
            'status' =>$request->status
        ]);
        $pendaftaran = Pendaftaran::find($request->pendaftaran_id);
        $status = $request->status=='lulus'?'LULUS':'TIDAK LULUS';
        Notifkasi::create([
            'user_id' => $pendaftaran->user_id,
            'notification'=>'Selamat Anda '. $status .' Tes Seleksi'
        ]);

        return redirect()->route('admin.seleksi.index')->with(['message' =>'Berhasil menambah data seleksi']);
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
        $check = Seleksi::with('pendaftaran.santri')->where('id',$id)->first();
        if($check){
            $pendaftaran = Pendaftaran::with('santri')->get();
            return view('pages.admin.seleksi.edit',compact('check','pendaftaran'));
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
    public function update(SeleksiRequest $request, $id)
    {
        $check = Seleksi::find($id);
        if($check){
            $total = ($request->nilai_baca_alquran + $request->nilai_tulis_arab + $request->nilai_wawancara) / 3;
            Seleksi::where('id',$id)->update([
                'nilai_baca_alquran' => $request->nilai_baca_alquran,
                'nilai_wawancara'=>$request->nilai_wawancara,
                'nilai_tulis_arab' => $request->nilai_tulis_arab,
                'total_penilaian' => $total,
                'kamar' => $request->kamar,
                'keterangan' => $request->keterangan,
                'kelas' =>$request->kelas,
                'status' =>$request->status
            ]);
            return redirect()->route('admin.seleksi.index')->with(['message' =>'Data berhasil diupdate']);
        }
        return redirect()->route('admin.seleksi.index')->with(['message' =>'Oppps error']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $check = Seleksi::find($id);
        if($check){
            return redirect()->route('admin.seleksi.index')->with(['message' =>'Data berhasil dihapus']);
        }
        return redirect()->route('admin.seleksi.index')->with(['message' =>'Oppps error']);
    }

    public function IDSeleksi()
    {
        $count = Seleksi::count();
        $count++;
        $no_urut = 'SN-'.date('YmdHis').$count;
        return $no_urut;
    }

    public function detail($id)
    {
        $seleksi = Seleksi::with('pendaftaran.santri')->where('id',$id)->first();
        if($seleksi){
            return view('pages.admin.seleksi.detail',compact('seleksi'));
        }

        return abort(404);
    }
}
