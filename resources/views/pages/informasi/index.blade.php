@extends('layouts.app')

@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
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
        </div>
    </div>
@endsection
