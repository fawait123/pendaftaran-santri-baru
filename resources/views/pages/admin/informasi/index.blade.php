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
                                {{-- table livewire --}}
                                <livewire:informasi />
                                {{-- end table livewire --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
