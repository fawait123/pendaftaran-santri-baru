<div>
    <div>
        <div class="row justify-content-end mb-3">
            <div class="col-xl-4  text-end">
                <a href="{{ route('admin.seleksi.create') }}" class="btn btn-primary btn-rounded">Tambah</a>
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
                <th>ID Seleksi</th>
                <th>Nama</th>
                <th>Baca Alquran</th>
                <th>Tulis Arab</th>
                <th>Wawancara</th>
                <th>Total</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if (count($data) > 0)
                @foreach ($data as $item)
                    <tr wire:key="user-{{ $item->id_seleksi }}">
                        <td>{{ $item->no_seleksi }}</td>
                        <td>{{ $item->pendaftaran->santri->nama_lengkap ?? '' }}</td>
                        <td>{{ $item->nilai_baca_alquran }}</td>
                        <td>{{ $item->nilai_tulis_arab }}</td>
                        <td>{{ $item->nilai_wawancara }}</td>
                        <td>{{ $item->total_penilaian }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.seleksi.detail', $item->id_seleksi) }}" class="text-primary"><i
                                    style="font-size: 19px" class="icofont icofont-open-eye"></i></a>
                            <a href="{{ route('admin.seleksi.edit', $item->id_seleksi) }}" class="text-warning"><i
                                    style="font-size: 19px" class="icofont icofont-ui-edit"></i></a>
                            <a href="{{ route('admin.seleksi.destroy', $item->id_seleksi) }}"
                                onclick="event.preventDefault();return confirm('yakin ingin menghapus data ?') ? document.getElementById('delete-form{{ $item->id_seleksi }}').submit() : false"
                                class="text-danger"><i style="font-size: 19px" class="icofont icofont-trash"></i></a>
                            <form action="{{ route('admin.seleksi.destroy', $item->id_seleksi) }}" method="post"
                                id="delete-form{{ $item->id_seleksi }}">
                                @method('delete')
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
