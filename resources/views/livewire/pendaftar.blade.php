<div>
    <div>
        <div class="row justify-content-end mb-3">
            <div class="col-xl-4  text-end">
                <a href="{{ route('admin.pendaftar.create') }}" class="btn btn-primary btn-rounded">Tambah</a>
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
                    <tr wire:key="user-{{ $item->id }}">
                        <td>{{ $item->no_daftar }}</td>
                        <td>{{ $item->santri->nama_lengkap }}</td>
                        <td>{{ $item->santri->email }}</td>
                        <td><span class="badge badge-light-success"><i data-feather="check"></i>Done</span></td>
                        <td class="text-center">
                            <a href="{{ route('admin.pendaftar.detail', $item->id) }}" class="text-primary"><i
                                    style="font-size: 19px" class="icofont icofont-open-eye"></i></a>
                            <a href="{{ route('admin.pendaftar.edit', $item->id) }}" class="text-warning"><i
                                    style="font-size: 19px" class="icofont icofont-ui-edit"></i></a>
                            <a href="{{ route('admin.pendaftar.destroy', $item->id) }}"
                                onclick="event.preventDefault();return confirm('yakin ingin menghapus data ?') ? document.getElementById('delete-form{{ $item->id }}').submit() : false"
                                class="text-danger"><i style="font-size: 19px" class="icofont icofont-trash"></i></a>
                            <form action="{{ route('admin.pendaftar.destroy', $item->id) }}" method="post"
                                id="delete-form{{ $item->id }}">
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
