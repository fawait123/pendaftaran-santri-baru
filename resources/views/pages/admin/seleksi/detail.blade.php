@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center">Tambah Data Seleksi</h5>
                    </div>
                    <form class="form theme-form" id="form-add" method="post"
                        action="{{ isset($id) ? route('admin.seleksi.update', $id) : route('admin.seleksi.store') }}">
                        @csrf
                        @if (isset($id))
                            @method('put')
                        @endif
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="pendaftaran_id">Tahun Pendaftaran</label>
                                        <select wire:model="tahun" class="form-control @error('tahun') is-invalid @enderror"
                                            id="tahun" type="text" value="{{ old('tahun') }}"
                                            placeholder="Pendaftaran" name="tahun" {{ isset($id) ? 'disabled' : '' }}>
                                            <option value="">-- pilih --</option>
                                            @for ($i = 10; $i <= 30; $i++)
                                                <option value="{{ '20' . $i }}">{{ '20' . $i }}</option>
                                            @endfor
                                        </select>
                                        @error('pendaftaran_id')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="kategori_seleksi">Pilih Ketegori Seleksi</label>
                                        <select wire:model="kategori_seleksi"
                                            class="form-control @error('kategori_seleksi') is-invalid @enderror"
                                            id="kategori_seleksi" type="text" value="{{ old('kategori_seleksi') }}"
                                            placeholder="Pendaftaran" name="kategori_seleksi"
                                            {{ isset($id) ? 'disabled' : '' }}>
                                            <option value="">-- pilih --</option>
                                            <option value="nilai_baca_alquran">Nilai Baca Alquran</option>
                                            <option value="nilai_tulis_arab">Nilai Tulis Arab</option>
                                            <option value="nilai_wawancara">Nilai Wawancara</option>
                                        </select>
                                        @error('kategori_seleksi')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                            <h4>1. Nilai Baca Alquran</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th rowspan="1" style="padding-right: 80px;">NO</th>
                                            <th rowspan="1" style="padding-right: 80px;">No Pendaftaran</th>
                                            <th rowspan="1" style="padding-right: 80px;">Nama</th>
                                            <th colspan="4"align="center">Ketepatan
                                                Tajwid</th>
                                            <th style="padding-right: 80px;">Makhroj</th>
                                            <th style="padding-right: 80px;">Kelancaran Membaca</th>
                                            <th style="padding-right: 80px;">Adab Membaca</th>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th style="padding-right: 80px;">Mad</th>
                                            <th style="padding-right: 80px;">Qalqalah</th>
                                            <th style="padding-right: 80px;">Idgham</th>
                                            <th style="padding-right: 80px;">Ikhfa</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 0;
                                        @endphp
                                        @foreach ($pendaftaran as $item)
                                            @if (isset($id))
                                                @php
                                                    $nilai = $item->detail->where('kategori_seleksi', 'nilai_baca_alquran')->first();
                                                    $nilai = json_decode($nilai->seleksi_data);
                                                @endphp
                                            @endif
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ isset($id) ? $item->pendaftaran->santri->nama_lengkap ?? '' : $item->santri->nama_lengkap ?? '' }}
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" readonly
                                                        name="pendaftaran_id[]"
                                                        value="{{ isset($id) ? $item->pendaftaran_id : $item->id_pendaftaran }}"
                                                        readonly>
                                                </td>
                                                <td>
                                                    <input class="form-control" readonly type="text"
                                                        name="mad[{{ $no }}]"
                                                        value="{{ isset($id) ? $nilai->mad : '' }}">
                                                </td>
                                                <td><input class="form-control" readonly type="text" name="qalqalah[]"
                                                        value="{{ isset($id) ? $nilai->qalqalah : '' }}">
                                                </td>
                                                <td><input class="form-control" readonly type="text" name="idgham[]"
                                                        value="{{ isset($id) ? $nilai->idgham : '' }}">
                                                </td>
                                                <td><input class="form-control" readonly type="text" name="makhroj[]"
                                                        value="{{ isset($id) ? $nilai->makhroj : '' }}">
                                                </td>
                                                <td><input class="form-control" readonly type="text" name="ikhfa[]"
                                                        value="{{ isset($id) ? $nilai->ikhfa : '' }}">
                                                </td>
                                                <td><input class="form-control" readonly type="text"
                                                        name="kelancaran_membaca[]"
                                                        value="{{ isset($id) ? $nilai->kelancaran_membaca : '' }}">
                                                </td>
                                                <td><input class="form-control" readonly type="text"
                                                        name="adab_membaca[]"
                                                        value="{{ isset($id) ? $nilai->adab_membaca : '' }}">
                                                </td>
                                            </tr>
                                            @php
                                                $no++;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <br>
                            <br>
                            <h4>2. Nilai Tulis Arab</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th rowspan="1" style="padding-right: 80px;">NO</th>
                                            <th rowspan="1" style="padding-right: 80px;">Nama</th>
                                            <th rowspan="1" style="padding-right: 80px;">No Pendaftaran
                                            </th>
                                            <th colspan="2" align="center">Menulis Syakal</th>
                                            <th colspan="3">Menyambung Syakal</th>
                                            <th style="padding-right: 80px;">Menulis Ayat Khusus</th>
                                            <th style="padding-right: 80px;">Menguasai Metode Tulis Arab</th>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th style="padding-right: 80px;">Dengan Syakal</th>
                                            <th style="padding-right: 80px;">Tanpa Syakal</th>
                                            <th style="padding-right: 80px;">2 Syakal</th>
                                            <th style="padding-right: 80px;">3 Syakal</th>
                                            <th style="padding-right: 80px;">4 Syakal</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 0;
                                        @endphp
                                        @foreach ($pendaftaran as $item)
                                            @if (isset($id))
                                                @php
                                                    $nilai = $item->detail->where('kategori_seleksi', 'nilai_tulis_arab')->first();
                                                    $nilai = json_decode($nilai->seleksi_data);
                                                @endphp
                                            @endif
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ isset($id) ? $item->pendaftaran->santri->nama_lengkap ?? '' : $item->santri->nama_lengkap ?? '' }}
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" readonly
                                                        name="pendaftaran_id[]"
                                                        value="{{ isset($id) ? $item->pendaftaran_id : $item->id_pendaftaran }}"
                                                        readonly>
                                                </td>
                                                <td>
                                                    <input class="form-control" readonly type="text"
                                                        name="dengan_syakal[{{ $no }}]"
                                                        value="{{ isset($id) ? $nilai->dengan_syakal : '' }}">
                                                </td>
                                                <td><input class="form-control" readonly type="text"
                                                        name="tanpa_syakal[]"
                                                        value="{{ isset($id) ? $nilai->tanpa_syakal : '' }}">
                                                </td>
                                                <td><input class="form-control" readonly type="text" name="2_syakal[]"
                                                        value="{{ isset($id) ? $nilai->syakal_2 : '' }}">
                                                </td>
                                                <td><input class="form-control" readonly type="text" name="3_syakal[]"
                                                        value="{{ isset($id) ? $nilai->syakal_3 : '' }}">
                                                </td>
                                                <td><input class="form-control" readonly type="text" name="4_syakal[]"
                                                        value="{{ isset($id) ? $nilai->syakal_4 : '' }}">
                                                </td>
                                                <td><input class="form-control" readonly type="text"
                                                        name="menulis_ayat_khusus[]"
                                                        value="{{ isset($id) ? $nilai->menulis_ayat_khusus : '' }}">
                                                </td>
                                                <td><input class="form-control" readonly type="text"
                                                        name="menguasai_metode_arab[]"
                                                        value="{{ isset($id) ? $nilai->menguasai_metode_arab : '' }}">
                                                </td>
                                            </tr>
                                            @php
                                                $no++;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <br>
                            <br>
                            <h4>3. Nilai Wawancara</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th rowspan="1" style="padding-right: 80px;">NO</th>
                                            <th rowspan="1" style="padding-right: 80px;">Nama</th>
                                            <th rowspan="1" style="padding-right: 80px;">No Pendaftaran
                                            </th>
                                            <th colspan="3" align="center">Motivasi Belajar</th>
                                            <th colspan="3">Kebersihan Lingkungan</th>
                                            <th colspan="3">Kemandirian</th>
                                            <th colspan="3">Hubungan Sosial</th>
                                            <th colspan="3">Adab Wawancara</th>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th style="padding-right: 80px;">1</th>
                                            <th style="padding-right: 80px;">2</th>
                                            <th style="padding-right: 80px;">3</th>
                                            <th style="padding-right: 80px;">1</th>
                                            <th style="padding-right: 80px;">2</th>
                                            <th style="padding-right: 80px;">3</th>
                                            <th style="padding-right: 80px;">1</th>
                                            <th style="padding-right: 80px;">2</th>
                                            <th style="padding-right: 80px;">3</th>
                                            <th style="padding-right: 80px;">1</th>
                                            <th style="padding-right: 80px;">2</th>
                                            <th style="padding-right: 80px;">3</th>
                                            <th style="padding-right: 80px;">1</th>
                                            <th style="padding-right: 80px;">2</th>
                                            <th style="padding-right: 80px;">3</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 0;
                                        @endphp
                                        @foreach ($pendaftaran as $item)
                                            @if (isset($id))
                                                @php
                                                    $nilai = $item->detail->where('kategori_seleksi', 'nilai_wawancara')->first();
                                                    $nilai = json_decode($nilai->seleksi_data);
                                                @endphp
                                            @endif
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ isset($id) ? $item->pendaftaran->santri->nama_lengkap ?? '' : $item->santri->nama_lengkap ?? '' }}
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" readonly
                                                        name="pendaftaran_id[]"
                                                        value="{{ isset($id) ? $item->pendaftaran_id : $item->id_pendaftaran }}"
                                                        readonly>
                                                </td>
                                                <td><input class="form-control" readonly type="text"
                                                        name="motivasi_1[]"
                                                        value="{{ isset($id) ? $nilai->motivasi_1 : '' }}">
                                                </td>
                                                <td><input class="form-control" readonly type="text"
                                                        name="motivasi_2[]"
                                                        value="{{ isset($id) ? $nilai->motivasi_2 : '' }}">
                                                </td>
                                                <td><input class="form-control" readonly type="text"
                                                        name="motivasi_3[]"
                                                        value="{{ isset($id) ? $nilai->motivasi_3 : '' }}">
                                                </td>
                                                <td><input class="form-control" readonly type="text"
                                                        name="kebersihan_1[]"
                                                        value="{{ isset($id) ? $nilai->kebersihan_1 : '' }}">
                                                </td>
                                                <td><input class="form-control" readonly type="text"
                                                        name="kebersihan_2[]"
                                                        value="{{ isset($id) ? $nilai->kebersihan_2 : '' }}">
                                                </td>
                                                <td><input class="form-control" readonly type="text"
                                                        name="kebersihan_3[]"
                                                        value="{{ isset($id) ? $nilai->kebersihan_3 : '' }}">
                                                </td>
                                                <td><input class="form-control" readonly type="text"
                                                        name="kemandirian_1[]"
                                                        value="{{ isset($id) ? $nilai->kemandirian_1 : '' }}">
                                                </td>
                                                <td><input class="form-control" readonly type="text"
                                                        name="kemandirian_2[]"
                                                        value="{{ isset($id) ? $nilai->kemandirian_2 : '' }}">
                                                </td>
                                                <td><input class="form-control" readonly type="text"
                                                        name="kemandirian_3[]"
                                                        value="{{ isset($id) ? $nilai->kemandirian_3 : '' }}">
                                                </td>
                                                <td><input class="form-control" readonly type="text" name="sosial_1[]"
                                                        value="{{ isset($id) ? $nilai->sosial_1 : '' }}">
                                                </td>
                                                <td><input class="form-control" readonly type="text" name="sosial_2[]"
                                                        value="{{ isset($id) ? $nilai->sosial_2 : '' }}">
                                                </td>
                                                <td><input class="form-control" readonly type="text" name="sosial_3[]"
                                                        value="{{ isset($id) ? $nilai->sosial_3 : '' }}">
                                                </td>
                                                <td><input class="form-control" readonly type="text" name="adab_1[]"
                                                        value="{{ isset($id) ? $nilai->adab_1 : '' }}">
                                                </td>
                                                <td><input class="form-control" readonly type="text" name="adab_2[]"
                                                        value="{{ isset($id) ? $nilai->adab_2 : '' }}">
                                                </td>
                                                <td><input class="form-control" readonly type="text" name="adab_3[]"
                                                        value="{{ isset($id) ? $nilai->adab_3 : '' }}">
                                                </td>
                                            </tr>
                                            @php
                                                $no++;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
