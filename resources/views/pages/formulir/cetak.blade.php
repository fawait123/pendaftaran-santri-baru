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
                            <h5 class="text-center">Formulir Pendaftaran Siswa Baru MySchool</h5>
                            <span class="text-secondary" style="font-weight: bold">Profile Data Anda</span>
                            <div style="display: flex">
                                <p style="width: 200px">Nomor Daftar</p>
                                <p>:{{ $pendaftaran->no_daftar }}</p>
                            </div>
                            <div style="display: flex">
                                <p style="width: 200px">Nama Lengkap</p>
                                <p>: {{ $pendaftaran->santri->nama_lengkap }}</p>
                            </div>
                            <div style="display: flex">
                                <p style="width: 200px">Tempat / Tanggal Lahir</p>
                                <p>: {{ $pendaftaran->santri->tempat_lahir }} / {{ $pendaftaran->santri->tgl_lahir }}</p>
                            </div>
                            <div style="display: flex">
                                <p style="width: 200px">Jenis Kelamin</p>
                                <p>: {{ $pendaftaran->santri->jenis_kelamin }}</p>
                            </div>
                            <div style="display: flex">
                                <p style="width: 200px">Golongan Darah</p>
                                <p>: {{ $pendaftaran->santri->gol_darah }}</p>
                            </div>
                            <div style="display: flex">
                                <p style="width: 200px">Berat / Tinggi</p>
                                <p>: {{ $pendaftaran->santri->berat_badan }} / {{ $pendaftaran->santri->tinggi_badan }}</p>
                            </div>
                            <div style="display: flex">
                                <p style="width: 200px">Alamat Lengkap</p>
                                <p>: {{ $pendaftaran->santri->alamat }}</p>
                            </div>
                            {{-- <div style="display: flex">
                                <p style="width: 200px">Agama</p>
                                <p>: Islam</p>
                            </div> --}}
                            <div style="display: flex">
                                <p style="width: 200px">Asal Sekolah</p>
                                <p>: {{ $pendaftaran->santri->asal_sekolah }}</p>
                            </div>
                            {{-- <div style="display: flex">
                                <p style="width: 200px">Alamat Sekolah</p>
                                <p>: Achmad Fawait</p>
                            </div> --}}
                            {{-- <div style="display: flex">
                                <p style="width: 200px">Tahun Lulus</p>
                                <p>: Achmad Fawait</p>
                            </div> --}}
                            {{-- <div style="display: flex">
                                <p style="width: 200px">No. Ijazah</p>
                                <p>: Achmad Fawait</p>
                            </div> --}}
                            <div style="display: flex">
                                <p style="width: 200px">No. Telp / HP</p>
                                <p>: {{ $pendaftaran->santri->no_hp }}</p>
                            </div>
                            <div style="display: flex">
                                <p style="width: 200px">Email</p>
                                <p>: {{ $pendaftaran->santri->email }}</p>
                            </div>
                            {{-- <div style="display: flex">
                                <p style="width: 200px">Pendidikan Jurusan</p>
                                <p>: Achmad Fawait</p>
                            </div> --}}
                            {{-- <div style="display: flex; margin-bottom:40px">
                                <p style="width: 200px">Nilai UN</p>
                                <p>: Achmad Fawait</p>
                            </div> --}}
                            <span class="text-secondary" style="font-weight: bold">Profile Data Orang
                                Tua</span>
                            <div style="display: flex">
                                <p style="width: 200px">Nama Ayah</p>
                                <p>:{{ $pendaftaran->santri->nama_ayah }}</p>
                            </div>
                            <div style="display: flex">
                                <p style="width: 200px">Nama Ibu</p>
                                <p>: {{ $pendaftaran->santri->nama_ibu }}</p>
                            </div>
                            <div style="display: flex">
                                <p style="width: 200px">No. Telp / HP</p>
                                <p>: {{ $pendaftaran->santri->no_hp }}</p>
                            </div>
                            <div style="display: flex">
                                <p style="width: 200px">Pekerjaan Ayah</p>
                                <p>: {{ $pendaftaran->santri->pekerjaan_ayah }}</p>
                            </div>
                            <div style="display: flex">
                                <p style="width: 200px">Pekerjaan Ibu</p>
                                <p>: {{ $pendaftaran->santri->pekerjaan_ibu }}</p>
                            </div>
                            <div style="display: flex">
                                <p style="width: 200px">Alamat</p>
                                <p>: Achmad Fawait</p>
                            </div>
                            <div style="display: flex;margin-bottom:40px">
                                <p style="width: 200px">Agama</p>
                                <p>: {{ $pendaftaran->santri->alamat }}</p>
                            </div>
                            <span class="text-secondary" style="font-weight: bold">Profile Data Wali
                                Tua</span>
                            <div style="display: flex">
                                <p style="width: 200px">Nama Wali</p>
                                <p>: {{ $pendaftaran->santri->nama_ayah }}</p>
                            </div>
                            <div style="display: flex">
                                <p style="width: 200px">No. Telp / HP</p>
                                <p>: {{ $pendaftaran->santri->no_hp }}</p>
                            </div>
                            <div style="display: flex">
                                <p style="width: 200px">Pekerjaan Wali</p>
                                <p>: {{ $pendaftaran->santri->pekerjaan_ayah }}</p>
                            </div>
                            <div style="display: flex">
                                <p style="width: 200px">Alamat</p>
                                <p>: {{ $pendaftaran->santri->alamat }}</p>
                            </div>
                            {{-- <div style="display: flex; margin-bottom:20px">
                                <p style="width: 200px">Agama</p>
                                <p>: Achmad Fawait</p>
                            </div> --}}
                            <button class="btn btn-primary btn-rounded">Cetak</button>
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
