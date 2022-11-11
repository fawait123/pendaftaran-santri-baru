@extends('layouts.app')


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center">Edit Data Informasi</h5>
                    </div>
                    <form class="form theme-form" method="post" action="{{ route('admin.informasi.update', $check->id) }}">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="row mt-3">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="tgl">Tanggal</label>
                                                <input class="form-control @error('tgl') is-invalid @enderror"
                                                    id="tgl" type="date" value="{{ $check->tgl }}"
                                                    placeholder="Tanggal" name="tgl">
                                                @error('tgl')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="title">Title</label>
                                                <input class="form-control @error('title') is-invalid @enderror"
                                                    id="title" type="text"
                                                    value="{{ old('title') ? old('title') : $check->title }}"
                                                    placeholder="Title" name="title">
                                                @error('title')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="description">Description</label>
                                                <input class="form-control @error('description') is-invalid @enderror"
                                                    id="description" type="text" value="{{ $check->description }}"
                                                    placeholder="Description" name="description">
                                                @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="step">step</label>
                                                <input class="form-control @error('step') is-invalid @enderror"
                                                    id="step" type="text" value="{{ $check->step }}"
                                                    placeholder="Step" name="step">
                                                @error('step')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
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
