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
                                    <span style="font-size: 20px;text-align: center">SELAMAT ANDA DITERIMA MENJADI SANTRI
                                        DI PONDOK PESANTREN
                                        DARUNJANNAH</span>
                                </div>
                            </div>
                            <button class="btn btn-primary">Lihat Hasil Seleksi</button>
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
    </div>
    <!-- Container-fluid Ends-->
@endsection
