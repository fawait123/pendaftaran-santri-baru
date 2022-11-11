@extends('layouts.app')

@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Kelola Notifikasi</h5>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('notifikasi.readAll') }}"
                            onclick="return confirm('Yakin ingin membaca semua notifikasi ?')"
                            class="btn btn-primary btn-sm">Read All</a>
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>Waktu</th>
                                    <th>Notifikasi</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($notifikasi as $item)
                                    <tr>
                                        <td>{{ $item->created_at->diffForHumans() }}</td>
                                        <td>{{ $item->notification }}</td>
                                        <td>{!! $item->is_read == true
                                            ? '<span class="badge bg-success">read</span>'
                                            : '<span class="badge bg-danger">unread</span>' !!}
                                        </td>
                                        <td>
                                            <a href="{{ route('notifikasi.read', $item->id) }}"
                                                onclick="return confirm('Read notifikasi sekarang ?')"
                                                class="text-primary {{ $item->is_read == true ? 'disabled-link' : '' }}">read</a>
                                            <a href="{{ route('notifikasi.destroy', $item->id) }}"
                                                onclick="event.preventDefault(); return confirm('Yakin ingin menghapus data ?') ? document.getElementById('form-delete{{ $item->id }}').submit() : false"
                                                class="text-danger">delete</a>
                                            <form action="{{ route('notifikasi.destroy', $item->id) }}" method="POST"
                                                id="form-delete{{ $item->id }}">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
