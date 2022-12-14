<div>
    <div>
        <div class="row justify-content-end mb-3">
            <div class="col-xl-4  text-end">
                <a href="{{ route('admin.informasi.create') }}" class="btn btn-primary btn-rounded">Tambah</a>
                <button class="btn btn-success" type="button" data-bs-toggle="modal"
                    data-bs-target="#exampleModalCenter">Preview</button>
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
                <th>Tanggal</th>
                <th>Title</th>
                <th>Deskripsi</th>
                <th>Step</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if (count($data) > 0)
                @foreach ($data as $item)
                    <tr wire:key="user-{{ $item->id_informasi }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->tgl }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->step }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.informasi.edit', $item->id_informasi) }}" class="text-warning"><i
                                    style="font-size: 19px" class="icofont icofont-ui-edit"></i></a>
                            <a href="{{ route('admin.informasi.destroy', $item->id_informasi) }}"
                                onclick="event.preventDefault();return confirm('yakin ingin menghapus data ?') ? document.getElementById('delete-form{{ $item->id_informasi }}').submit() : false"
                                class="text-danger"><i style="font-size: 19px" class="icofont icofont-trash"></i></a>
                            <form action="{{ route('admin.informasi.destroy', $item->id_informasi) }}" method="post"
                                id="delete-form{{ $item->id_informasi }}">
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
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Preview Informasi</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header card-no-border">
                            <h5>Informasi</h5>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li><i class="fa fa-spin fa-cog"></i></li>
                                    <li><i class="view-html fa fa-code"></i></li>
                                    <li><i class="icofont icofont-maximize full-card"></i></li>
                                    <li><i class="icofont icofont-minus minimize-card"></i></li>
                                    <li><i class="icofont icofont-refresh reload-card"></i></li>
                                    <li><i class="icofont icofont-error close-card"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body new-update pt-0">
                            <div class="activity-timeline">
                                @foreach ($informasi as $item)
                                    <div class="media">
                                        <div class="activity-line"></div>
                                        <div class="activity-dot-secondary"></div>
                                        <div class="media-body"><span>{{ $item->title }}
                                                {!! strtotime($item->tgl) == strtotime(date('Y-m-d'))
                                                    ? '<i class="fa fa-circle circle-dot-secondary pull-right"></i>'
                                                    : '' !!}}</span>
                                            <p class="font-roboto">{{ date('d M Y', strtotime($item->tgl)) }}
                                            <p class="font-roboto">{{ $item->description }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="button">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
