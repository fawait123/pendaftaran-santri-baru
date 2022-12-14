<div>
    <div>
        <div class="row justify-content-end mb-3">
            <div class="col-xl-8  text-end">
                <a href="{{ route('admin.pendaftar.create') }}" class="btn btn-primary btn-rounded">Tambah</a>
                <a href="{{ route('admin.pendaftar.verifikasi.all') }}"
                    onclick="return confirm('Yakin verifikasi semua data ? ')"
                    class="btn btn-success btn-rounded">Verifikasi
                    Semua</a>
            </div>
            <div class="col-xl-4">
                <input wire:model="search" type="text" class="form-control" style="border-radius: 20px"
                    placeholder="Search...">
            </div>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>No Pendaftaran</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Status</th>
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
                        <td class="text-center">
                            <a title="Verifikasi"
                                href="{{ route('admin.pendaftar.verifikasi', $item->id_pendaftaran) }}"
                                onclick="event.preventDefault();return confirm('Verifikasi sekarang ?') ? document.getElementById('verifikasi-form{{ $item->id_pendaftaran }}').submit() : false"
                                class="text-primary {{ $item->verifikasi == true ? 'disabled-link' : '' }}"><i
                                    style="font-size: 19px" class="icofont icofont-ui-fire-wall"></i></a>
                            <a title="Detail" href="{{ route('admin.pendaftar.detail', $item->id_pendaftaran) }}"
                                class="text-primary"><i style="font-size: 19px"
                                    class="icofont icofont-open-eye"></i></a>
                            <a title="Edit" href="{{ route('admin.pendaftar.edit', $item->id_pendaftaran) }}"
                                class="text-warning"><i style="font-size: 19px" class="icofont icofont-ui-edit"></i></a>
                            <a title="Hapus" href="{{ route('admin.pendaftar.destroy', $item->id_pendaftaran) }}"
                                onclick="event.preventDefault();return confirm('yakin ingin menghapus data ?') ? document.getElementById('delete-form{{ $item->id_pendaftaran }}').submit() : false"
                                class="text-danger"><i style="font-size: 19px" class="icofont icofont-trash"></i></a>
                            <form action="{{ route('admin.pendaftar.destroy', $item->id_pendaftaran) }}" method="post"
                                id="delete-form{{ $item->id_pendaftaran }}">
                                @method('delete')
                                @csrf
                            </form>
                            <form action="{{ route('admin.pendaftar.verifikasi', $item->id_pendaftaran) }}"
                                method="post" id="verifikasi-form{{ $item->id_pendaftaran }}">
                                @csrf
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td style="text-align: center; font-size:16px;" colspan="5">Data tidak ditemukan</td>
                </tr>
            @endif
        </tbody>
    </table>
    <div style="margin-top: 25px;position: relative; padding-bottom:20px">
        <nav style="position: absolute;right:0">
            <ul class="pagination pagination-primary">
                {{ $data->links() }}
            </ul>
        </nav>
    </div>
</div>
