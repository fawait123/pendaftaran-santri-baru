<div>
    <div>
        <div class="row justify-content-end mb-3">
            <div class="col-xl-8  text-end">
                <a href="{{ route('admin.pendaftar.create') }}" class="btn btn-primary btn-rounded">Tambah</a>
                {{-- <a href="{{ route('admin.pendaftar.verifikasi.all') }}"
                    onclick="return confirm('Yakin verifikasi semua data ? ')"
                    class="btn btn-success btn-rounded">Verifikasi
                    Semua</a> --}}
            </div>
            <div class="col-xl-4">
                <input wire:model="search" type="text" class="form-control" style="border-radius: 20px"
                    placeholder="Search...">
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>No Pendaftaran</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Verifikasi</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if (count($data) > 0)
                    @foreach ($data as $item)
                        <tr wire:key="user-{{ $item->id_pendaftaran }}">
                            <td>{{ $item->no_daftar }}</td>
                            <td>{{ $item->santri->nama_lengkap }}</td>
                            <td>{{ $item->santri->email }}</td>
                            <td>
                                @if ($item->verifikasi == null)
                                    <span class="badge badge-light-danger"><i class="icofont icofont-ui-clock"></i>Belum
                                        diverifikasi</span>
                                @else
                                    <span class="badge badge-light-success"><i
                                            class="icofont icofont-ui-check"></i>{{ $item->verifikasi == true ? 'Verifikasi' : 'Ditolak' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $item->status }}
                            </td>
                            <td>
                                {{ $item->keterangan }}
                            </td>
                            <td class="text-center">
                                <a title="Verifikasi" href="#" data-bs-toggle="modal" data-original-title="test"
                                    data-bs-target="#exampleModal{{ $loop->iteration }}"
                                    class="text-primary {{ $item->verifikasi == true ? 'disabled-link' : '' }}"><i
                                        style="font-size: 19px" class="icofont icofont-ui-fire-wall"></i></a>
                                <a title="Detail" href="{{ route('admin.pendaftar.detail', $item->id_pendaftaran) }}"
                                    class="text-primary"><i style="font-size: 19px"
                                        class="icofont icofont-open-eye"></i></a>
                                <a title="Edit" href="{{ route('admin.pendaftar.edit', $item->id_pendaftaran) }}"
                                    class="text-warning"><i style="font-size: 19px"
                                        class="icofont icofont-ui-edit"></i></a>
                                <a title="Hapus" href="{{ route('admin.pendaftar.destroy', $item->id_pendaftaran) }}"
                                    onclick="event.preventDefault();return confirm('yakin ingin menghapus data ?') ? document.getElementById('delete-form{{ $item->id_pendaftaran }}').submit() : false"
                                    class="text-danger"><i style="font-size: 19px"
                                        class="icofont icofont-trash"></i></a>
                                <form action="{{ route('admin.pendaftar.destroy', $item->id_pendaftaran) }}"
                                    method="post" id="delete-form{{ $item->id_pendaftaran }}">
                                    @method('delete')
                                    @csrf
                                </form>
                                <form action="{{ route('admin.pendaftar.verifikasi', $item->id_pendaftaran) }}"
                                    method="post" id="verifikasi-form{{ $item->id_pendaftaran }}">
                                    @csrf
                                </form>
                            </td>
                        </tr>
                        <div class="modal fade" id="exampleModal{{ $loop->iteration }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Verifikasi data
                                            {{ $item->santri->nama_lengkap }}</h5>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('admin.pendaftar.verifikasi', $item->id_pendaftaran) }}"
                                        method="post">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $item->user_id }}">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="keterangan">Keterangan</label>
                                                        <textarea name="keterangan" id="keterangan" cols="30" rows="10" class="form-control">{{ $item->keterangan }}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="status">Status</label>
                                                        <select name="status" id="status" class="form-control">
                                                            <option value="">pilih</option>
                                                            <option value="on proses"
                                                                {{ $item->status == 'on proses' ? 'selected' : '' }}>On
                                                                Proses
                                                            </option>
                                                            <option value="acc"
                                                                {{ $item->status == 'acc' ? 'selected' : '' }}>Acc
                                                            </option>
                                                            <option value="tolak"
                                                                {{ $item->status == 'tolak' ? 'selected' : '' }}>Tolak
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" type="button"
                                                data-bs-dismiss="modal">Close</button>
                                            <button class="btn btn-secondary" type="submit">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    @endforeach
                @else
                    <tr>
                        <td style="text-align: center; font-size:16px;" colspan="5">Data tidak ditemukan</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div style="margin-top: 25px;position: relative; padding-bottom:20px">
        <nav style="position: absolute;right:0">
            <ul class="pagination pagination-primary">
                {{ $data->links() }}
            </ul>
        </nav>
    </div>
</div>
