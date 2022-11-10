@extends('layouts.app')

@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="best-seller-table responsive-tbl">
                            <div class="item">
                                <h5 class="text-center">Download Laporan Data Santri</h5>
                                <form action="{{ route('admin.laporan.download') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <input type="hidden" name="data" value="santri">
                                        {{-- <div class="col-xl-5">
                                            <div class="form-group">
                                                <label for="start_date">Start</label>
                                                <input type="date" name="start_date" value="{{ old('start_date') }}"
                                                    class="form-control @error('start_date') is-invalid @enderror"
                                                    style="border-radius: 20px;">
                                                @error('start_date')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-5">
                                            <div class="form-group">
                                                <label for="end_date">End</label>
                                                <input type="date" name="end_date" value="{{ old('end_date') }}"
                                                    class="form-control @error('end_date') is-invalid @enderror"
                                                    style="border-radius: 20px;">
                                                @error('end_date')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div> --}}
                                        <div class="col-xl-2" style="margin-top: 30px">
                                            <button type="submit"
                                                class="btn btn-primary btn-sm btn-rounded">Download</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
