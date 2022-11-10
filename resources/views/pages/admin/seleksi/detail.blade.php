@extends('layouts.app')

@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="user-profile">
            <div class="row">
                <!-- user profile third-style end-->
                <!-- user profile fourth-style start-->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="profile-img-style">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="media"><img class="img-thumbnail rounded-circle me-3"
                                            src="../assets/images/user/7.jpg" alt="Generic placeholder image">
                                        <div class="media-body align-self-center">
                                            <h5 class="mt-0 user-name">{{ auth()->user()->nama_lengkap }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 align-self-center">
                                    <div class="float-sm-end">
                                        <small>{{ $seleksi->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h5 class="text-center">Detail Seleksi</h5>
                            <span class="text-secondary" style="font-weight: bold">Profile Data Santri</span>
                            <div style="display: flex">
                                <p style="width: 200px">Nomor Daftar</p>
                                <p>:{{ $seleksi->no_seleksi }}</p>
                            </div>
                            <div style="display: flex">
                                <p style="width: 200px">Nama Lengkap</p>
                                <p>: {{ $seleksi->pendaftaran->santri->nama_lengkap }}</p>
                            </div>
                            <div style="display: flex">
                                <p style="width: 200px">Tempat / Tanggal Lahir</p>
                                <p>: {{ $seleksi->pendaftaran->santri->tempat_lahir }} /
                                    {{ $seleksi->pendaftaran->santri->tgl_lahir }}</p>
                            </div>
                            <div style="display: flex">
                                <p style="width: 200px">Jenis Kelamin</p>
                                <p>: {{ $seleksi->pendaftaran->santri->jenis_kelamin }}</p>
                            </div>
                            <div style="display: flex">
                                <p style="width: 200px">Golongan Darah</p>
                                <p>: {{ $seleksi->pendaftaran->santri->gol_darah }}</p>
                            </div>
                            <div style="display: flex">
                                <p style="width: 200px">Berat / Tinggi</p>
                                <p>: {{ $seleksi->pendaftaran->santri->berat_badan }} /
                                    {{ $seleksi->pendaftaran->santri->tinggi_badan }}</p>
                            </div>
                            <div style="display: flex">
                                <p style="width: 200px">Alamat Lengkap</p>
                                <p>: {{ $seleksi->pendaftaran->santri->alamat }}</p>
                            </div>
                            <div style="display: flex">
                                <p style="width: 200px">Asal Sekolah</p>
                                <p>: {{ $seleksi->pendaftaran->santri->asal_sekolah }}</p>
                            </div>
                            <div style="display: flex">
                                <p style="width: 200px">No. Telp / HP</p>
                                <p>: {{ $seleksi->pendaftaran->santri->no_hp }}</p>
                            </div>
                            <div style="display: flex; margin-bottom:30px;">
                                <p style="width: 200px">Email</p>
                                <p>: {{ $seleksi->pendaftaran->santri->email }}</p>
                            </div>
                            <span class="text-secondary" style="font-weight: bold">Detail Nilai</span>
                            <div style="display: flex">
                                <p style="width: 200px">Nilai Baca Alquran</p>
                                <p>:{{ $seleksi->nilai_baca_alquran }}</p>
                            </div>
                            <div style="display: flex">
                                <p style="width: 200px">Nilai Tulis Arab</p>
                                <p>:{{ $seleksi->nilai_tulis_arab }}</p>
                            </div>
                            <div style="display: flex">
                                <p style="width: 200px">Nilai Wawancara</p>
                                <p>:{{ $seleksi->nilai_wawancara }}</p>
                            </div>
                            <div style="display: flex">
                                <p style="width: 200px">Total Nilai</p>
                                <p><span class="badge badge-primary">:{{ $seleksi->total_penilaian }}</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- user profile fourth-style end-->
                <!-- user profile fifth-style start-->
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection
