<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SeleksiRequest;
use App\Models\Seleksi;
use App\Models\Pendaftaran;
use App\Models\Notifkasi;
use App\Models\DetailSeleksi;

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
    public function store_backup(Request $request)
    {
        dd($request->all());
        $pembagi = $request->kategori_seleksi == 'nilai_wawancara' ? 15 : 28;
        $pendaftaran_id = $request->pendaftaran_id;
        $mad = $request->mad;
        $qalqalah = $request->qalqalah;
        $idgham = $request->idgham;
        $makhroj = $request->makhroj;
        $kelancaran_membaca = $request->kelancaran_membaca;
        $adab_membaca = $request->adab_membaca;
        for($i =0; $i < count($pendaftaran_id); $i++){
            $cari = Seleksi::where('pendaftaran_id',$pendaftaran_id[$i])->first();
            $jumlah_skor = $mad[$i] + $qalqalah[$i] + $idgham[$i] + $makhroj[$i] + $kelancaran_membaca[$i] + $adab_membaca[$i];
            $nilai_akhir = ($jumlah_skor * 100) / $pembagi;
            $dataSeleksi = [
                'mad'=>$mad[$i],
                'qalqalah'=>$qalqalah[$i],
                'idgham'=>$idgham[$i],
                'makhroj'=>$makhroj[$i],
                'kelancaran_membaca'=>$kelancaran_membaca[$i],
                'adab_membaca'=>$adab_membaca[$i]
            ];
            if($cari){
                if($request->kategori_seleksi == 'nilai_wawancara'){
                    $nilai_tulis_arab = $cari->nilai_tulis_arab ? $cari->nilai_tulis_arab : 0;
                    $nilai_nilai_baca_alquran = $cari->nilai_baca_alquran ? $cari->nilai_baca_alquran : 0;
                    $total = ($nilai_akhir + $nilai_tulis_arab + $nilai_nilai_baca_alquran) / 3;
                    $kelas = $total > 60 ? 'awalliyah robi' : 'awalliyah tsalist';
                    Seleksi::where('pendaftaran_id',$pendaftaran_id[$i])->update([
                        'nilai_wawancara'=> $nilai_akhir,
                        'total_penilaian' => $total,
                        'kelas' =>$kelas,
                    ]);

                    DetailSeleksi::create([
                        'seleksi_id'=>$cari->id_seleksi,
                        'kategori_seleksi'=>$request->kategori_seleksi,
                        'seleksi_data'=>json_encode($dataSeleksi),
                    ]);

                }else if($request->kategori_seleksi == 'nilai_tulis_arab'){
                    $nilai_wawancara = $cari->nilai_wawancara ? $cari->nilai_wawancara : 0;
                    $nilai_nilai_baca_alquran = $cari->nilai_baca_alquran ? $cari->nilai_baca_alquran : 0;
                    $total = ($nilai_akhir + $nilai_wawancara + $nilai_nilai_baca_alquran) / 3;
                    $kelas = $total > 60 ? 'awalliyah robi' : 'awalliyah tsalist';
                    Seleksi::where('pendaftaran_id',$pendaftaran_id[$i])->update([
                        'nilai_tulis_arab'=>$nilai_akhir,
                        'total_penilaian' => $total,
                        'kelas' =>$kelas,
                    ]);

                    DetailSeleksi::create([
                        'seleksi_id'=>$cari->id_seleksi,
                        'kategori_seleksi'=>$request->kategori_seleksi,
                        'seleksi_data'=>json_encode($dataSeleksi),
                    ]);
                }else if($request->kategori_seleksi == 'nilai_baca_alquran'){
                    $nilai_tulis_arab = $cari->nilai_tulis_arab ? $cari->nilai_tulis_arab : 0;
                    $nilai_wawancara = $cari->nilai_wawancara ? $cari->nilai_wawancara : 0;
                    $total = ($nilai_akhir + $nilai_tulis_arab + $nilai_wawancara) / 3;
                    $kelas = $total > 60 ? 'awalliyah robi' : 'awalliyah tsalist';
                    Seleksi::where('pendaftaran_id',$pendaftaran_id[$i])->update([
                        'nilai_baca_alquran'=>$nilai_akhir,
                        'total_penilaian' => $total,
                        'kelas' =>$kelas,
                    ]);

                    DetailSeleksi::create([
                        'seleksi_id'=>$cari->id_seleksi,
                        'kategori_seleksi'=>$request->kategori_seleksi,
                        'seleksi_data'=>json_encode($dataSeleksi),
                    ]);
                }
            }else{
                if($request->kategori_seleksi == 'nilai_wawancara'){
                    $nilai_tulis_arab = 0;
                    $nilai_nilai_baca_alquran = 0;
                    $total = ($nilai_akhir + $nilai_tulis_arab + $nilai_nilai_baca_alquran) / 3;
                    $kelas = $total > 60 ? 'awalliyah robi' : 'awalliyah tsalist';
                    $seleksi = Seleksi::create([
                        'no_seleksi'=>$this->IDSeleksi(),
                        'pendaftaran_id' => $pendaftaran_id[$i],
                        'nilai_wawancara'=>$nilai_akhir,
                        'total_penilaian' => $total,
                        'kelas' =>$kelas,
                    ]);
                    DetailSeleksi::create([
                        'seleksi_id'=>$seleksi->id_seleksi,
                        'kategori_seleksi'=>$request->kategori_seleksi,
                        'seleksi_data'=>json_encode($dataSeleksi),
                    ]);
                }else if($request->kategori_seleksi == 'nilai_tulis_arab'){
                    $nilai_wawancara =  0;
                    $nilai_nilai_baca_alquran =  0;
                    $total = ($nilai_akhir + $nilai_wawancara + $nilai_nilai_baca_alquran) / 3;
                    $kelas = $total > 60 ? 'awalliyah robi' : 'awalliyah tsalist';
                    $seleksi = Seleksi::create([
                        'no_seleksi'=>$this->IDSeleksi(),
                        'pendaftaran_id' => $pendaftaran_id[$i],
                        'nilai_tulis_arab'=>$nilai_akhir,
                        'total_penilaian' => $total,
                        'kelas' =>$kelas,
                    ]);
                    DetailSeleksi::create([
                        'seleksi_id'=>$seleksi->id_seleksi,
                        'kategori_seleksi'=>$request->kategori_seleksi,
                        'seleksi_data'=>json_encode($dataSeleksi),
                    ]);
                }else if($request->kategori_seleksi == 'nilai_baca_alquran'){
                    $nilai_tulis_arab = 0;
                    $nilai_wawancara =  0;
                    $total = ($nilai_akhir + $nilai_tulis_arab + $nilai_wawancara) / 3;
                    $kelas = $total > 60 ? 'awalliyah robi' : 'awalliyah tsalist';
                    $seleksi = Seleksi::create([
                        'no_seleksi'=>$this->IDSeleksi(),
                        'pendaftaran_id' => $pendaftaran_id[$i],
                        'nilai_tulis_arab'=>$nilai_akhir,
                        'total_penilaian' => $total,
                        'kelas' =>$kelas,
                    ]);
                    DetailSeleksi::create([
                        'seleksi_id'=>$seleksi->id_seleksi,
                        'kategori_seleksi'=>$request->kategori_seleksi,
                        'seleksi_data'=>json_encode($dataSeleksi),
                    ]);
                }
            }
        }
        // $total = ($request->nilai_baca_alquran + $request->nilai_tulis_arab + $request->nilai_wawancara) / 3;
        // Seleksi::create([
        //     'no_seleksi'=>$this->IDSeleksi(),
        //     'pendaftaran_id' => $request->pendaftaran_id,
        //     'nilai_baca_alquran' => $request->nilai_baca_alquran,
        //     'nilai_wawancara'=>$request->nilai_wawancara,
        //     'nilai_tulis_arab' => $request->nilai_tulis_arab,
        //     'total_penilaian' => $total,
        //     'kamar' => $request->kamar,
        //     'keterangan' => $request->keterangan,
        //     'kelas' =>$request->kelas,
        //     'status' =>$request->status
        // ]);
        // $pendaftaran = Pendaftaran::find($request->pendaftaran_id);
        // $status = $request->status=='lulus'?'LULUS':'TIDAK LULUS';
        // Notifkasi::create([
        //     'user_id' => $pendaftaran->user_id,
        //     'notification'=>'Selamat Anda '. $status .' Tes Seleksi'
        // ]);

        return redirect()->route('admin.seleksi.index')->with(['message' =>'Berhasil menambah data seleksi']);
    }

    public function store(Request $request)
    {
        if($request->kategori_seleksi == 'nilai_baca_alquran'){
            $nilaiBacaAlquran = $this->calculateBacaAlquran($request->all());
            foreach($nilaiBacaAlquran as $nilai){
                $check = Seleksi::where('pendaftaran_id',$nilai['pendaftaran_id'])->first();

                if($check){
                    $nilaiA = ($nilai['nilai_akhir'] + $check['nilai_wawancara'] + $check['nilai_tulis_arab']) / 3;
                    $kelas = $nilaiA > 60 ? 'awalliyah robi' : 'awalliyah tsalist';
                    Seleksi::where('pendaftaran_id',$nilai['pendaftaran_id'])->update([
                        'nilai_baca_alquran'=>$nilai['nilai_akhir'],
                        'total_penilaian' => ($nilai['nilai_akhir'] + $check['nilai_wawancara'] + $check['nilai_tulis_arab']) / 3,
                        'kelas' =>$kelas,
                    ]);
                    DetailSeleksi::create([
                        'seleksi_id'=>$check['id_seleksi'],
                        'kategori_seleksi'=>$request['kategori_seleksi'],
                        'seleksi_data'=>$nilai['data'],
                    ]);
                }else{
                    $nilaiA = ($nilai['nilai_akhir']) / 3;
                    $kelas = $nilaiA > 60 ? 'awalliyah robi' : 'awalliyah tsalist';
                    $seleksi = Seleksi::create([
                        'no_seleksi'=>$this->IDSeleksi(),
                        'pendaftaran_id' => $nilai['pendaftaran_id'],
                        'nilai_baca_alquran'=>$nilai['nilai_akhir'],
                        'total_penilaian' => $nilai['nilai_akhir'] / 3,
                        'kelas' =>$kelas,
                    ]);

                    DetailSeleksi::create([
                        'seleksi_id'=>$seleksi['id_seleksi'],
                        'kategori_seleksi'=>$request['kategori_seleksi'],
                        'seleksi_data'=>$nilai['data'],
                    ]);
                }

            }
        }else if($request->kategori_seleksi == 'nilai_tulis_arab'){
            $nilaiTulisArab = $this->calculateNilaiTulisArab($request->all());
            foreach($nilaiTulisArab as $nilai){
                $check = Seleksi::where('pendaftaran_id',$nilai['pendaftaran_id'])->first();

                if($check){
                    $nilaiA = ($nilai['nilai_akhir'] + $check['nilai_wawancara'] + $check['nilai_baca_alquran']) / 3;
                    $kelas = $nilaiA > 60 ? 'awalliyah robi' : 'awalliyah tsalist';
                    Seleksi::where('pendaftaran_id',$nilai['pendaftaran_id'])->update([
                        'nilai_tulis_arab'=>$nilai['nilai_akhir'],
                        'total_penilaian' => ($nilai['nilai_akhir'] + $check['nilai_wawancara'] + $check['nilai_baca_alquran']) / 3,
                        'kelas' =>$kelas,
                    ]);
                    DetailSeleksi::create([
                        'seleksi_id'=>$check['id_seleksi'],
                        'kategori_seleksi'=>$request['kategori_seleksi'],
                        'seleksi_data'=>$nilai['data'],
                    ]);
                }else{
                    $nilaiA = ($nilai['nilai_akhir']) / 3;
                    $kelas = $nilaiA > 60 ? 'awalliyah robi' : 'awalliyah tsalist';
                    $seleksi = Seleksi::create([
                        'no_seleksi'=>$this->IDSeleksi(),
                        'pendaftaran_id' => $nilai['pendaftaran_id'],
                        'nilai_tulis_arab'=>$nilai['nilai_akhir'],
                        'total_penilaian' => $nilai['nilai_akhir'] / 3,
                        'kelas' =>$kelas,
                    ]);

                    DetailSeleksi::create([
                        'seleksi_id'=>$seleksi['id_seleksi'],
                        'kategori_seleksi'=>$request['kategori_seleksi'],
                        'seleksi_data'=>$nilai['data'],
                    ]);
                }

            }
        }else if($request->kategori_seleksi == 'nilai_wawancara'){
            $nilaiWawancara = $this->calculateNilaiWawancara($request->all());
            foreach($nilaiWawancara as $nilai){
                $check = Seleksi::where('pendaftaran_id',$nilai['pendaftaran_id'])->first();

                if($check){
                    $nilaiA = ($nilai['nilai_akhir'] + $check['nilai_tulis_arab'] + $check['nilai_baca_alquran']) / 3;
                    $kelas = $nilaiA > 60 ? 'awalliyah robi' : 'awalliyah tsalist';
                    Seleksi::where('pendaftaran_id',$nilai['pendaftaran_id'])->update([
                        'nilai_wawancara'=>$nilai['nilai_akhir'],
                        'total_penilaian' => ($nilai['nilai_akhir'] + $check['nilai_tulis_arab'] + $check['nilai_baca_alquran']) / 3,
                        'kelas' =>$kelas,
                    ]);
                    DetailSeleksi::create([
                        'seleksi_id'=>$check['id_seleksi'],
                        'kategori_seleksi'=>$request['kategori_seleksi'],
                        'seleksi_data'=>$nilai['data'],
                    ]);
                }else{
                    $nilaiA = ($nilai['nilai_akhir']) / 3;
                    $kelas = $nilaiA > 60 ? 'awalliyah robi' : 'awalliyah tsalist';
                    $seleksi = Seleksi::create([
                        'no_seleksi'=>$this->IDSeleksi(),
                        'pendaftaran_id' => $nilai['pendaftaran_id'],
                        'nilai_wawancara'=>$nilai['nilai_akhir'],
                        'total_penilaian' => $nilai['nilai_akhir'] / 3,
                        'kelas' =>$kelas,
                    ]);

                    DetailSeleksi::create([
                        'seleksi_id'=>$seleksi['id_seleksi'],
                        'kategori_seleksi'=>$request['kategori_seleksi'],
                        'seleksi_data'=>$nilai['data'],
                    ]);
                }

            }
        }

        return redirect()->route('admin.seleksi.index')->with(['message' =>'Berhasil menambah data seleksi']);

    }

    public function calculateBacaAlquran($data)
    {
        $arr = collect([]);
        $pendaftaran_id = $data['pendaftaran_id'];
        $mad = $data['mad'];
        $qalqalah = $data['qalqalah'];
        $idgham = $data['idgham'];
        $makhroj = $data['makhroj'];
        $kelancaran_membaca = $data['kelancaran_membaca'];
        $adab_membaca = $data['adab_membaca'];

        for($i=0; $i < count($pendaftaran_id);$i++){
            $total = $mad[$i] + $qalqalah[$i] + $idgham[$i] + $makhroj[$i] + $kelancaran_membaca[$i] + $adab_membaca[$i];
            $arr->push([
                'pendaftaran_id'=>$pendaftaran_id[$i],
                'jumlah_skor'=>$total,
                'nilai_akhir'=>($total * 100) / 28,
                'data'=>json_encode([
                    'mad'=>$mad[$i],
                    'qalqalah'=>$qalqalah[$i],
                    'idgham'=>$idgham[$i],
                    'makhroj'=>$makhroj[$i],
                    'kelancaran_membaca'=>$kelancaran_membaca[$i],
                    'adab_membaca'=>$adab_membaca[$i]
                ]),
            ]);
        }
        return $arr;
    }

    public function calculateNilaiTulisArab($data){
        $arr = collect([]);
        $pendaftaran_id = $data['pendaftaran_id'];
        $dengan_syakal = $data['dengan_syakal'];
        $tanpa_syakal = $data['tanpa_syakal'];
        $syakal_2 = $data['2_syakal'];
        $syakal_3 = $data['3_syakal'];
        $syakal_4 = $data['4_syakal'];
        $menulis_ayat_khusus = $data['menulis_ayat_khusus'];
        $menguasai_metode_arab = $data['menguasai_metode_arab'];

        for($i=0; $i < count($pendaftaran_id);$i++){
            $total = $tanpa_syakal[$i] + $dengan_syakal[$i] + $syakal_2[$i] + $syakal_3[$i] + $syakal_4[$i] + $menulis_ayat_khusus[$i] + $menguasai_metode_arab[$i];
            $arr->push([
                'pendaftaran_id'=>$pendaftaran_id[$i],
                'jumlah_skor'=>$total,
                'nilai_akhir'=>($total * 100) / 28,
                'data'=>json_encode([
                    'dengan_syakal'=>$dengan_syakal,
                    'tanpa_syakal'=>$tanpa_syakal,
                    'syakal_2'=>$syakal_2,
                    'syakal_3'=>$syakal_3,
                    'syakal_4'=>$syakal_4,
                    'menulis_ayat_khusus'=>$menulis_ayat_khusus,
                    'menguasai_metode_arab'=>$menguasai_metode_arab,
                ])
            ]);
        }
        return $arr;
    }

    public function calculateNilaiWawancara($data){
        $arr = collect([]);
        $pendaftaran_id = $data['pendaftaran_id'];
        $motivasi_1 = $data['motivasi_1'];
        $motivasi_2 = $data['motivasi_2'];
        $motivasi_3 = $data['motivasi_3'];
        $kebersihan_1 = $data['kebersihan_1'];
        $kebersihan_2 = $data['kebersihan_2'];
        $kebersihan_3 = $data['kebersihan_3'];
        $kemandirian_1 = $data['kemandirian_1'];
        $kemandirian_2 = $data['kemandirian_2'];
        $kemandirian_3 = $data['kemandirian_3'];
        $sosial_1 = $data['sosial_1'];
        $sosial_2 = $data['sosial_2'];
        $sosial_3 = $data['sosial_3'];
        $adab_1 = $data['adab_1'];
        $adab_2 = $data['adab_2'];
        $adab_3 = $data['adab_3'];

        for($i=0; $i < count($pendaftaran_id);$i++){
            $total = $motivasi_1[$i] + $motivasi_2[$i] + $motivasi_3[$i]
            + $kebersihan_1[$i] + $kebersihan_2[$i] + $kebersihan_3[$i]
            + $kemandirian_1[$i] + $kemandirian_2[$i] + $kemandirian_3[$i]
            + $sosial_1[$i] + $sosial_2[$i] + $sosial_3[$i]
            + $adab_1[$i] + $adab_2[$i] + $adab_3[$i];
            $arr->push([
                'pendaftaran_id'=>$pendaftaran_id[$i],
                'jumlah_skor'=>$total,
                'nilai_akhir'=>($total * 100) / 15,
                'data'=>json_encode([
                    'motivasi_1'=>$motivasi_1,
                    'motivasi_2'=>$motivasi_2,
                    'motivasi_3'=>$motivasi_3,
                    'kebersihan_1'=>$kebersihan_1,
                    'kebersihan_2'=>$kebersihan_2,
                    'kebersihan_3'=>$kebersihan_3,
                    'kemandirian_1'=>$kemandirian_1,
                    'kemandirian_2'=>$kemandirian_2,
                    'kemandirian_3'=>$kemandirian_3,
                    'sosial_1'=>$sosial_1,
                    'sosial_2'=>$sosial_2,
                    'sosial_3'=>$sosial_3,
                    'adab_1'=>$adab_1,
                    'adab_2'=>$adab_2,
                    'adab_3'=>$adab_3,
                ])
            ]);
        }
        return $arr;
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
        $check = Seleksi::with('pendaftaran.santri')->where('id_seleksi',$id)->first();
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
        $check = Seleksi::where('id_seleksi',$id)->first();
        if($check){
            $total = ($request->nilai_baca_alquran + $request->nilai_tulis_arab + $request->nilai_wawancara) / 3;
            Seleksi::where('id_seleksi',$id)->update([
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
        $check = Seleksi::where('id_seleksi',$id)->first();
        if($check){
            Seleksi::where('id_seleksi',$id)->delete();
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
        $seleksi = Seleksi::with('pendaftaran.santri')->where('id_seleksi',$id)->first();
        if($seleksi){
            return view('pages.admin.seleksi.detail',compact('seleksi'));
        }

        return abort(404);
    }
}
