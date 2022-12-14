@extends('layouts.app')

@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row second-chart-list third-news-update">
            <div class="col-xl-4 col-lg-12 xl-50 morning-sec box-col-12">
                <div class="card profile-greeting">
                    <div class="card-body pb-0">
                        <div class="media">
                            <div class="media-body">
                                <div class="greeting-user">
                                    <h4 class="f-w-600 font-primary" id="greeting">Good Morning</h4>
                                    <p>Here whats happing in your account today</p>
                                    <div class="whatsnew-btn"><a class="btn btn-primary">Whats New !</a>
                                    </div>
                                </div>
                            </div>
                            <div class="badge-groups">
                                <div class="badge f-10"><i class="me-1" data-feather="clock"></i><span
                                        id="txt"></span></div>
                            </div>
                        </div>
                        <div class="cartoon"><img class="img-fluid" src="{{ asset('assets') }}/images/dashboard/cartoon.png"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 xl-100 chart_data_left box-col-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="row m-0 chart-main">
                            <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                <div class="media align-items-center">
                                    <div class="hospital-small-chart">
                                        <div class="small-bar">
                                            <div class="small-chart flot-chart-container"></div>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div class="right-chart-content">
                                            <h4>1001</h4><span>Purchase </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                <div class="media align-items-center">
                                    <div class="hospital-small-chart">
                                        <div class="small-bar">
                                            <div class="small-chart1 flot-chart-container"></div>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div class="right-chart-content">
                                            <h4>1005</h4><span>Sales</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                <div class="media align-items-center">
                                    <div class="hospital-small-chart">
                                        <div class="small-bar">
                                            <div class="small-chart2 flot-chart-container"></div>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div class="right-chart-content">
                                            <h4>100</h4><span>Sales return</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                <div class="media border-none align-items-center">
                                    <div class="hospital-small-chart">
                                        <div class="small-bar">
                                            <div class="small-chart3 flot-chart-container"></div>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div class="right-chart-content">
                                            <h4>101</h4><span>Purchase ret</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 xl-50 chart_data_right box-col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="media-body right-chart-content">
                                <h4>$95,900<span class="new-box">Hot</span></h4><span>Purchase Order
                                    Value</span>
                            </div>
                            <div class="knob-block text-center">
                                <input class="knob1" data-width="10" data-height="70" data-thickness=".3"
                                    data-angleoffset="0" data-linecap="round" data-fgcolor="#7366ff" data-bgcolor="#eef5fb"
                                    value="60">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 xl-50 chart_data_right second d-none">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="media-body right-chart-content">
                                <h4>$95,000<span class="new-box">New</span></h4><span>Product Order
                                    Value</span>
                            </div>
                            <div class="knob-block text-center">
                                <input class="knob1" data-width="50" data-height="70" data-thickness=".3"
                                    data-fgcolor="#7366ff" data-linecap="round" data-angleoffset="0" value="60">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-12 xl-50 calendar-sec box-col-6">
                <div class="card gradient-primary o-hidden">
                    <div class="card-body">
                        <div class="setting-dot">
                            <div class="setting-bg-primary date-picker-setting pull-right">
                                <div class="icon-box"><i data-feather="more-horizontal"></i></div>
                            </div>
                        </div>
                        <div class="default-datepicker">
                            <div class="datepicker-here" data-language="en"></div>
                        </div><span class="default-dots-stay overview-dots full-width-dots"><span class="dots-group"><span
                                    class="dots dots1"></span><span class="dots dots2 dot-small"></span><span
                                    class="dots dots3 dot-small"></span><span class="dots dots4 dot-medium"></span><span
                                    class="dots dots5 dot-small"></span><span class="dots dots6 dot-small"></span><span
                                    class="dots dots7 dot-small-semi"></span><span
                                    class="dots dots8 dot-small-semi"></span><span class="dots dots9 dot-small">
                                </span></span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection
