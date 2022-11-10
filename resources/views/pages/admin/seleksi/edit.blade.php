@extends('layouts.app')


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center">Edit Data Seleksi</h5>
                    </div>
                    <form class="form theme-form" method="post" action="{{ route('admin.seleksi.update', $check->id) }}">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    {{-- <div class="mb-3">
                                        <label class="form-label" for="pendaftaran_id">Pilih Nomor Pendaftaran</label>
                                        <select class="form-control @error('pendaftaran_id') is-invalid @enderror"
                                            id="pendaftaran_id" type="text" value="{{ old('pendaftaran_id') }}"
                                            placeholder="Nama Lengkap" name="pendaftaran_id">
                                            <option value="">-- pilih --</option>
                                            @foreach ($pendaftaran as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == $check->pendaftaran_id ? 'selected' : '' }}>
                                                    {{ $item->no_daftar }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('pendaftaran_id')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div> --}}
                                    <div class="row mt-3">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="pendaftaran_id">No Pendaftaran</label>
                                                <input class="form-control @error('pendaftaran_id') is-invalid @enderror"
                                                    id="pendaftaran_id" type="text" value="{{ $check->no_seleksi }}"
                                                    disabled placeholder="Nama Lengkap" name="pendaftaran_id">
                                                @error('pendaftaran_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="nama_lengkap">Nama Lengkap</label>
                                                <input class="form-control @error('nama_lengkap') is-invalid @enderror"
                                                    id="nama_lengkap" type="text"
                                                    value="{{ $check->pendaftaran->santri->nama_lengkap }}" disabled
                                                    placeholder="Nama Lengkap" name="nama_lengkap">
                                                @error('nama_lengkap')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="nilai_baca_alquran">Nilai Baca
                                                    Alquran</label>
                                                <input
                                                    class="form-control @error('nilai_baca_alquran') is-invalid @enderror"
                                                    id="nilai_baca_alquran" type="text"
                                                    value="{{ $check->nilai_baca_alquran }}"
                                                    placeholder="Nilai Baca Alquran" name="nilai_baca_alquran">
                                                @error('nilai_baca_alquran')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="nilai_wawancara">Nilai Wawancara</label>
                                                <input class="form-control @error('nilai_wawancara') is-invalid @enderror"
                                                    id="nilai_wawancara" type="text"
                                                    value="{{ $check->nilai_wawancara }}" placeholder="Nama Lengkap"
                                                    name="nilai_wawancara">
                                                @error('nilai_wawancara')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="nilai_tulis_arab">Nilai Tulis Arab</label>
                                                <input class="form-control @error('nilai_tulis_arab') is-invalid @enderror"
                                                    id="nilai_tulis_arab" type="text"
                                                    value="{{ $check->nilai_tulis_arab }}" placeholder="Nama Lengkap"
                                                    name="nilai_tulis_arab">
                                                @error('nilai_tulis_arab')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="kamar">Kamar</label>
                                                <input class="form-control @error('kamar') is-invalid @enderror"
                                                    id="kamar" type="text" value="{{ $check->kamar }}"
                                                    placeholder="Nama Lengkap" name="kamar">
                                                @error('kamar')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="keterangan">Keterangan</label>
                                                <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan"
                                                    cols="30" rows="10">{{ $check->keterangan }}</textarea>
                                                @error('keterangan')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <input class="btn btn-light" type="reset" value="Cancel">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
