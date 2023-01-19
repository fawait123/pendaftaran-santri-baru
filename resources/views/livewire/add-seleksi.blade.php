<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center">Tambah Data Seleksi</h5>
                    </div>
                    <form class="form theme-form" id="form-add" method="post" action="{{ route('admin.seleksi.store') }}">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="pendaftaran_id">Pilih Tahun Pendaftaran</label>
                                        <select wire:model="tahun"
                                            class="form-control @error('pendaftaran_id') is-invalid @enderror"
                                            id="pendaftaran_id" type="text" value="{{ old('pendaftaran_id') }}"
                                            placeholder="Pendaftaran" name="pendaftaran_id">
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
                                        <select class="form-control @error('kategori_seleksi') is-invalid @enderror"
                                            id="kategori_seleksi" type="text" value="{{ old('kategori_seleksi') }}"
                                            placeholder="Pendaftaran" name="kategori_seleksi">
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
                            @if ($isShow)
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th rowspan="1" style="padding-right: 80px;">NO</th>
                                                <th rowspan="1" style="padding-right: 80px;">No Pendaftaran</th>
                                                <th rowspan="1" style="padding-right: 80px;">Nama</th>
                                                <th colspan="3"align="center">Ketepatan
                                                    Tajwid</th>
                                                <th style="padding-right: 80px;">Makhroj</th>
                                                <th style="padding-right: 80px;">Kelancaran Membaca</th>
                                                <th style="padding-right: 80px;">Adab Membaca</th>
                                                <th style="padding-right: 80px;">Jumlah Skor</th>
                                                <th style="padding-right: 80px;">Nilai Akhir</th>
                                            </tr>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th style="padding-right: 80px;">Mad</th>
                                                <th style="padding-right: 80px;">Qalqalah</th>
                                                <th style="padding-right: 80px;">Idgham</th>
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
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->santri->nama_lengkap }}</td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            name="pendaftaran_id[]" value="{{ $item->id_pendaftaran }}"
                                                            readonly>
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="text"
                                                            name="mad[{{ $no }}]">
                                                    </td>
                                                    <td><input class="form-control" type="text" name="qalqalah[]">
                                                    </td>
                                                    <td><input class="form-control" type="text" name="idgham[]"></td>
                                                    <td><input class="form-control" type="text" name="makhroj[]">
                                                    </td>
                                                    <td><input class="form-control" type="text"
                                                            name="kelancaran_membaca[]"></td>
                                                    <td><input class="form-control" type="text"
                                                            name="adab_membaca[]"></td>
                                                    <td><input class="form-control" type="text" name="jumlah_skor[]">
                                                    </td>
                                                    <td><input class="form-control" type="text" name="nilai_akhir[]">
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
                        <div class="card-footer text-end">
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <input class="btn btn-light" type="reset" value="Cancel">
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('customjs')
    <script>
        $(document).ready(function() {
            $('#form-add').validate({ // initialize the plugin
                ignore: [],
                rules: {
                    'pendaftaran_id': {
                        required: true,
                    },
                    'kategori_seleksi': {
                        required: true,
                    },
                    'mad[]': {
                        required: true,
                    },
                },
                highlight: function(element) {
                    $(element).closest('.form-group').addClass('has-error');
                },
                unhighlight: function(element) {
                    $(element).closest('.form-group').removeClass('has-error');
                },
                errorElement: 'span',
                errorClass: 'help-block',
                errorPlacement: function(error, element) {
                    if (element.parent('.input-group').length) {
                        error.insertAfter(element.parent());
                    } else {
                        error.insertAfter(element);
                    }
                }
            });

        });
    </script>
@endpush
