@extends('layouts.app')

@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        @if ($pendaftaran)
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
                                                src="{{ auth()->user()->foto == null ? asset('assets/images/user/7.jpg') : auth()->user()->foto }}"
                                                alt="Generic placeholder image">
                                            <div class="media-body align-self-center">
                                                <h5 class="mt-0 user-name">{{ auth()->user()->nama_lengkap }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 align-self-center">
                                        <div class="float-sm-end">
                                            <small>{{ $pendaftaran->created_at->diffForHumans() }}</small>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <h1 class="text-center">PENGUMUMAN</h1>
                                <div style="display: flex">
                                    <p style="width: 200px">No. Pendaftaran</p>
                                    <p>: {{ $pendaftaran->no_daftar }}</p>
                                </div>
                                <div style="display: flex">
                                    <p style="width: 200px">Nama</p>
                                    <p>: {{ $pendaftaran->santri->nama_lengkap }}</p>
                                </div>
                                <div style="display: flex;justify-content: center;">
                                    <div style="width: 300px;padding:20px;margin-top:20px; text-align:center;">
                                        @if (count($pendaftaran->seleksi) > 0)
                                            @if ($pendaftaran->seleksi[0]->status == 'lulus')
                                                <span style="font-size: 20px;text-align: center">SELAMAT ANDA DITERIMA
                                                    MENJADI
                                                    SANTRI
                                                    DI PONDOK PESANTREN
                                                    DARUNNAJAH</span>
                                            @else
                                                <span style="font-size: 20px;text-align: center">MAAF ANDA TIDAK DITERIMA
                                                    MENJADI SANTRI DI PONDOK PESANTREN DARUNJANNAH, SILAHKAN COBA LAGI
                                                    NANTI</span>
                                            @endif
                                        @else
                                            <span style="font-size: 20px;text-align: center">BELUM ADA PENGUMUMAN SELEKSI,
                                                SILAHKAN DI CEK LAGI NANTI</span>
                                        @endif
                                    </div>
                                </div>
                                @if (count($pendaftaran->seleksi) > 0)
                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalCenter">Lihat Hasil Seleksi</button>
                                @endif
                                <div class="like-comment mt-4">
                                    <ul class="list-inline">
                                        <li class="list-inline-item border-right pe-3">
                                            <label class="m-0"><a href="#"><i class="fa fa-heart"></i></a>
                                                Dashboard</label><span class="ms-2 counter">2659</span>
                                        </li>
                                        <li class="list-inline-item ms-2">
                                            <label class="m-0"><a href="#"><i class="fa fa-comment"></i></a>
                                                Data Santri</label><span class="ms-2 counter">569</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- user profile fourth-style end-->
                    <!-- user profile fifth-style start-->
                </div>
            </div>
        @else
            <div class="card">
                <div class="card-body">
                    <h6 class="text-center">Anda Belum melakukan pendaftaran, silahkan daftar terlebih dahulu</h6>
                </div>
            </div>
        @endif
    </div>
    <!-- Container-fluid Ends-->
    {{-- <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Vertically
        centered</button> --}}
    @if ($pendaftaran)
        @if (count($pendaftaran->seleksi) > 0)
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenter" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Hasil Seleksi</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div style="display: flex">
                                <p style="width: 200px">ID Seleksi</p>
                                <p>: {{ $pendaftaran->seleksi[0]->no_seleksi }}</p>
                            </div>
                            <div style="display: flex">
                                <p style="width: 200px">Nilai Baca Alquran</p>
                                <p>: {{ $pendaftaran->seleksi[0]->nilai_baca_alquran }}</p>
                            </div>
                            <div style="display: flex">
                                <p style="width: 200px">Nilai Wawancara</p>
                                <p>: {{ $pendaftaran->seleksi[0]->nilai_wawancara }}</p>
                            </div>
                            <div style="display: flex">
                                <p style="width: 200px">Nilai Tulis Arab</p>
                                <p>: {{ $pendaftaran->seleksi[0]->nilai_tulis_arab }}</p>
                            </div>
                            <div style="display: flex">
                                <p style="width: 200px">Kamar</p>
                                <p>: {{ $pendaftaran->seleksi[0]->kamar }}</p>
                            </div>
                            <div style="display: flex">
                                <p style="width: 200px">Status</p>
                                <p>: {{ $pendaftaran->seleksi[0]->status }}</p>
                            </div>
                            <div style="display: flex">
                                <p style="width: 200px">Kelas</p>
                                <p>: {{ $pendaftaran->seleksi[0]->kelas }}</p>
                            </div>
                            <div style="display: flex">
                                <p style="width: 200px">Keterangan</p>
                                <p>: {{ $pendaftaran->seleksi[0]->keterangan != null ? $pendaftaran->seleksi[0]->keterangan : 'Tidak Ada Keterangan' }}
                                </p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif
@endsection
