<div>
    <div>
        <div class="row justify-content-end mb-3">
            <div class="col-xl-4  text-end">
                <a href="{{ route('admin.user.create') }}" class="btn btn-primary btn-rounded">Tambah</a>
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
                <th>NO</th>
                <th>Username</th>
                <th>Email</th>
                <th>Nama Lengkap</th>
                <th>NO HP</th>
                <th>Role</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if (count($data) > 0)
                @foreach ($data as $item)
                    <tr wire:key="user-{{ $item->id_user }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->nama_lengkap }}</td>
                        <td>{{ $item->no_hp }}</td>
                        <td>{{ $item->role }}</td>
                        <td class="text-center">
                            <a title="Edit" href="{{ route('admin.user.edit', $item->id_user) }}"
                                class="text-warning"><i style="font-size: 19px" class="icofont icofont-ui-edit"></i></a>
                            <a href="{{ route('admin.user.destroy', $item->id_user) }}"
                                onclick="event.preventDefault();return confirm('yakin ingin menghapus data ?') ? document.getElementById('delete-form{{ $item->id_user }}').submit() : false"
                                class="text-danger"><i style="font-size: 19px" class="icofont icofont-trash"></i></a>
                            <form action="{{ route('admin.user.destroy', $item->id_user) }}" method="post"
                                id="delete-form{{ $item->id_user }}">
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
