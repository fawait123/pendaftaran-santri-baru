@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center">Formulir Pendaftaran Santri</h5>
                    </div>
                    <form class="form theme-form" method="post"
                        action="{{ route('formulir.change.update', $pendaftaran->id_pendaftaran) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <span class="text-secondary">Biodata Santri</span>
                            <div class="row mt-3">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="nama_lengkap">Nama Lengkap</label>
                                        <input class="form-control @error('nama_lengkap') is-invalid @enderror"
                                            id="nama_lengkap" type="text"
                                            value="{{ $pendaftaran->santri->nama_lengkap ?? '' }}"
                                            placeholder="Nama Lengkap" name="nama_lengkap">
                                        @error('nama_lengkap')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="tempat_lahir">Tempat Lahir</label>
                                        <input class="form-control @error('tempat_lahir') is-invalid @enderror"
                                            id="tempat_lahir" type="text"
                                            value="{{ $pendaftaran->santri->tempat_lahir ?? '' }}"
                                            placeholder="Tempat Lahir" name="tempat_lahir">
                                        @error('tempat_lahir')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="tgl_lahir">Tanggal Lahir</label>
                                        <input class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir"
                                            type="date" value="{{ $pendaftaran->santri->tgl_lahir ?? '' }}"
                                            placeholder="Tanggal Lahir" name="tgl_lahir">
                                        @error('tgl_lahir')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                                        <select class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                            id="jenis_kelamin" type="text" placeholder="Nama Lengkap"
                                            name="jenis_kelamin">
                                            <option value="">-- pilih --</option>
                                            <option value="laki-laki"
                                                {{ $pendaftaran->santri->jenis_kelamin ?? '' == 'laki-laki' ? 'selected' : '' }}>
                                                Laki Laki</option>
                                            <option value="perempuan"
                                                {{ $pendaftaran->santri->jenis_kelamin ?? '' == 'perempuan' ? 'selected' : '' }}>
                                                Perempuan
                                            </option>
                                        </select>
                                        @error('jenis_kelamin')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="gol_darah">Golongan Darah</label>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-check radio radio-primary">
                                                    <input class="form-check-input" id="gol1" type="radio"
                                                        name="gol_darah"
                                                        {{ $pendaftaran->santri->gol_darah == 'A' ? 'checked' : '' }}
                                                        value="A">
                                                    <label class="form-check-label" for="gol1">A</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check radio radio-primary">
                                                    <input class="form-check-input" id="gol2" type="radio"
                                                        name="gol_darah" value="AB"
                                                        {{ $pendaftaran->santri->gol_darah == 'AB' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="gol2">AB</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check radio radio-primary">
                                                    <input class="form-check-input" id="gol3" type="radio"
                                                        name="gol_darah" value="B"
                                                        {{ $pendaftaran->santri->gol_darah == 'B' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="gol3">B</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check radio radio-primary">
                                                    <input class="form-check-input" id="gol4" type="radio"
                                                        name="gol_darah" value="O"
                                                        {{ $pendaftaran->santri->gol_darah == 'O' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="gol4">O</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check radio radio-primary">
                                                    <input class="form-check-input" id="gol5" type="radio"
                                                        name="gol_darah" value="Tidak Tahu"
                                                        {{ $pendaftaran->santri->gol_darah == 'Tidak Tahu' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="gol5">Tidak Tahu</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @error('gol_darah')
                                        <span class="text-danger text-small">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="berat_badan">Berat Badan</label>
                                        <input class="form-control @error('berat_badan') is-invalid @enderror"
                                            id="berat_badan" type="text" name="berat_badan"
                                            value="{{ $pendaftaran->santri->berat_badan ?? '' }}">
                                        @error('berat_badan')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="tinggi_badan">Tinggi Badan</label>
                                        <input class="form-control @error('tinggi_badan') is-invalid @enderror"
                                            id="tinggi_badan" type="text"
                                            value="{{ $pendaftaran->santri->tinggi_badan ?? '' }}"
                                            placeholder="Tinggi Badan" name="tinggi_badan">
                                        @error('tinggi_badan')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div>
                                        <label class="form-label" for="alamat">Alamat</label>
                                        <textarea class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat" id="alamat"
                                            name="alamat" rows="3">{{ $pendaftaran->santri->alamat ?? '' }}</textarea>
                                        @error('alamat')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="asal_sekolah">Asal Sekolah</label>
                                        <input class="form-control @error('asal_sekolah') is-invalid @enderror"
                                            id="asal_sekolah" type="text"
                                            value="{{ $pendaftaran->santri->asal_sekolah ?? '' }}"
                                            placeholder="Asal Sekolah" name="asal_sekolah">
                                        @error('asal_sekolah')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="jenjang_pend">Jenjang Pendidikan</label>
                                        <select name="jenjang_pend" id="jenjang_pend" class="form-control">
                                            <option value="">-- pilih --</option>
                                            @foreach ($jenjang as $j)
                                                <option value="{{ $j->id_jenjang_pendidikan }}"
                                                    {{ $pendaftaran->santri->id_jenjang_pend ?? '' == $j->id_jenjang_pendidikan ? 'selected' : '' }}>
                                                    {{ $j->jenjang_pend }}</option>
                                            @endforeach
                                        </select>
                                        @error('jenjang_pend')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="hobi">Hobi</label>
                                        <input class="form-control @error('hobi') is-invalid @enderror" id="hobi"
                                            type="text" value="{{ $pendaftaran->santri->hobi ?? '' }}"
                                            placeholder="Hobi" name="hobi">
                                        @error('hobi')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="anak_ke">Anak Ke</label>
                                        <input class="form-control @error('anak_ke') is-invalid @enderror" id="anak_ke"
                                            type="text" value="{{ $pendaftaran->santri->anak_ke ?? '' }}"
                                            placeholder="Anak Ke" name="anak_ke">
                                        @error('anak_ke')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="no_kk">No Kartu Keluarga</label>
                                        <input class="form-control @error('no_kk') is-invalid @enderror" type="text"
                                            value="{{ $pendaftaran->santri->no_kk ?? '' }}"
                                            placeholder="Nomor Kartu Keluarga" name="no_kk">
                                        @error('no_kk')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="nik">No Induk Keluarga</label>
                                        <input class="form-control @error('nik') is-invalid @enderror" id="nik"
                                            type="text" value="{{ $pendaftaran->santri->nik ?? '' }}"
                                            placeholder="No Induk Keluarga" name="nik">
                                        @error('nik')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="no_hp">NO HP</label>
                                        <input class="form-control @error('no_hp') is-invalid @enderror" id="no_hp"
                                            type="text" value="{{ $pendaftaran->santri->no_hp ?? '' }}"
                                            placeholder="NO HP" name="no_hp">
                                        @error('no_hp')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="email">Email</label>
                                        <input class="form-control @error('email') is-invalid @enderror" id="email"
                                            type="text" value="{{ $pendaftaran->santri->email ?? '' }}"
                                            placeholder="Email" name="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <span class="text-secondary text-bold">Data Orang Tua</span>
                            <div class="row mt-3">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="nik_ayah">NIK Ayah</label>
                                        <input class="form-control @error('nik_ayah') is-invalid @enderror"
                                            id="nik_ayah" type="text"
                                            value="{{ $pendaftaran->santri->nik_ayah ?? '' }}" placeholder="NIK Ayah"
                                            name="nik_ayah">
                                        @error('nik_ayah')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="nama_ayah">Nama Ayah</label>
                                        <input class="form-control @error('nama_ayah') is-invalid @enderror"
                                            id="nama_ayah" type="text"
                                            value="{{ $pendaftaran->santri->nama_ayah ?? '' }}" placeholder="Nama Ayah"
                                            name="nama_ayah">
                                        @error('nama_ayah')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="pekerjaan_ayah">Pekerjaan Ayah</label>
                                        <input class="form-control @error('pekerjaan_ayah') is-invalid @enderror"
                                            id="pekerjaan_ayah" type="text"
                                            value="{{ $pendaftaran->santri->pekerjaan_ayah ?? '' }}"
                                            placeholder="Pekerjaan Ayah" name="pekerjaan_ayah">
                                        @error('pekerjaan_ayah')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="nik_ibu">NIK Ibu</label>
                                        <input class="form-control @error('nik_ibu') is-invalid @enderror" id="nik_ibu"
                                            type="text" value="{{ $pendaftaran->santri->nik_ibu ?? '' }}"
                                            placeholder="NIK Ibu" name="nik_ibu">
                                        @error('nik_ibu')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="nama_ibu">Nama Ibu</label>
                                        <input class="form-control @error('nama_ibu') is-invalid @enderror"
                                            id="nama_ibu" type="text"
                                            value="{{ $pendaftaran->santri->nama_ibu ?? '' }}" placeholder="Nama Ibu"
                                            name="nama_ibu">
                                        @error('nama_ibu')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="pekerjaan_ibu">Pekerjaan Ibu</label>
                                        <input class="form-control @error('pekerjaan_ibu') is-invalid @enderror"
                                            id="pekerjaan_ibu" type="text"
                                            value="{{ $pendaftaran->santri->pekerjaan_ibu ?? '' }}"
                                            placeholder="Pekerjaan Ibu" name="pekerjaan_ibu">
                                        @error('pekerjaan_ibu')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label" for="thn_daftar">Tahun Daftar</label>
                                    <input class="form-control @error('thn_daftar') is-invalid @enderror"
                                        id="thn_daftar" type="text" value="{{ old('thn_daftar') }}"
                                        placeholder="Tahun Daftar" name="thn_daftar">
                                    @error('thn_daftar')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div> --}}
                            </div>
                            <span class="text-secondary text-bold">Upload Persyaratan</span>
                            <div class="row mt-3">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="foto">Upload Pas Foto 3x4</label>
                                        <input class="form-control dropify" id="foto" type="file"
                                            data-allowed-file-extensions="jpg jpeg png jfif" id="no_kk"
                                            placeholder="Nama Lengkap" name="foto"
                                            data-default-file="{{ $pendaftaran->santri->foto }}">
                                        @error('foto')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="fc_kk">Upload Fotokopi KK</label>
                                        <input class="form-control dropify" id="fc_kk"
                                            data-allowed-file-extensions="jpg jpeg png jfif" type="file"
                                            placeholder="Nama Lengkap" name="fc_kk">
                                        @error('fc_kk')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="fc_akta">Upload Fotokopi Akta
                                            Kelahiran</label>
                                        <input class="form-control dropify" id="fc_akta"
                                            data-allowed-file-extensions="jpg jpeg png jfif" type="file"
                                            placeholder="Nama Lengkap" name="fc_akta">
                                        @error('fc_akta')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
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

@push('customjs')
    <script>
        $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop a file here or click',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });

        resetPreview('foto', '{{ $pendaftaran->santri->foto }}',
            'Image.jpg');
        resetPreview('fc_kk', '{{ $pendaftaran->santri->fc_kk }}',
            'Image.jpg');
        resetPreview('fc_akta', '{{ $pendaftaran->santri->fc_akta }}',
            'Image.jpg');


        function resetPreview(name, src, fname = '') {
            let input = $('input[name="' + name + '"]');
            let wrapper = input.closest('.dropify-wrapper');
            let preview = wrapper.find('.dropify-preview');
            let filename = wrapper.find('.dropify-filename-inner');
            let render = wrapper.find('.dropify-render').html('');

            input.val('').attr('title', fname);
            wrapper.removeClass('has-error').addClass('has-preview');
            filename.html(fname);

            render.append($('<img />').attr('src', src).css('max-height', input.data('height') || ''));
            preview.fadeIn();
        }
    </script>
@endpush
