@extends('layouts.app')


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center">Tambah Data Pengguna</h5>
                    </div>
                    <form class="form theme-form" method="post" action="{{ route('admin.user.update', $check->id_user) }}">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="form-group">
                                <label class="col-form-label">Nama Lengkap</label>
                                <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror"
                                    name="nama_lengkap" value="{{ $check->nama_lengkap }}" placeholder="nama lengkap">
                                @error('nama_lengkap')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Username</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    name="username" value="{{ $check->username }}" placeholder="username">
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Email Address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ $check->email }}" placeholder="Test@gmail.com">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">NO HP</label>
                                <input type="text" class="form-control @error('no_hp') is-invalid @enderror"
                                    name="no_hp" value="{{ $check->no_hp }}" placeholder="08xxxx">
                                @error('no_hp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Role</label>
                                <div class="form-input position-relative">
                                    <select name="role" id="role" class="form-control">
                                        <option value="">-- pilih --</option>
                                        <option value="admin" {{ $check->role == 'admin' ? 'selected' : '' }}>Admin
                                        </option>
                                        <option value="santri" {{ $check->role == 'santri' ? 'selected' : '' }}>Santri
                                        </option>
                                    </select>
                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Password</label>
                                <div class="form-input position-relative">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        name="password" placeholder="*********">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Ulangi Password</label>
                                <div class="form-input">
                                    <input type="password" type="password" class="form-control" name="password_confirmation"
                                        placeholder="*********">
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
