@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="user-profile">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card hovercard text-center">
                        <div class="cardheader"
                            style="background-image: url({{ $profile->foto == null ? asset('assets/images/user/7.jpg') : $profile->foto }})">
                        </div>
                        <div class="user-image">
                            <div class="avatar"><img alt=""
                                    src="{{ $profile->foto == null ? asset('assets/images/user/7.jpg') : $profile->foto }}">
                            </div>
                            <div class="icon-wrapper"><i class="icofont icofont-pencil-alt-5"
                                    onclick="document.getElementById('form-upload-file').click()"></i></div>
                            <form action="" enctype="multipart/form-data" id="form-upload">
                                @csrf
                                <input type="file" name="file" hidden id="form-upload-file">
                            </form>
                        </div>
                        <div class="info">
                            <div class="row">
                                <div class="col-sm-6 col-lg-4 order-sm-1 order-xl-0">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="ttl-info text-start">
                                                <h6><i class="fa fa-envelope"></i> Email</h6>
                                                <span>{{ $profile->email }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="ttl-info text-start">
                                                <h6><i class="fa fa-user"></i> Username</h6>
                                                <span>{{ $profile->username }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-4 order-sm-0 order-xl-1">
                                    <div class="user-designation">
                                        <div class="title"><a target="_blank"
                                                href="">{{ $profile->nama_lengkap }}</a></div>
                                        <div class="desc">{{ $profile->role }}</div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4 order-sm-2 order-xl-2">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="ttl-info text-start">
                                                <h6><i class="fa fa-phone"></i> Contact Us</h6><span>Indonesia
                                                    {{ $profile->no_hp }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="ttl-info text-start">
                                                <h6><i class="fa fa-location-arrow"></i> Location</h6><span>B69 Near Schoool
                                                    Demo Home</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="social-media">
                                <ul class="list-inline">
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-google-plus"></i></a>
                                    </li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-rss"></i></a></li>
                                </ul>
                            </div>
                            <div class="follow">
                                <div class="row">
                                    <div class="col-6 text-md-end border-right">
                                        <div class="follow-num counter">25869</div><span>Follower</span>
                                    </div>
                                    <div class="col-6 text-md-start">
                                        <div class="follow-num counter">659887</div><span>Following</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- user profile first-style end-->
            </div>
        </div>
    </div>
@endsection

@push('customjs')
    <script>
        $(document).ready(function() {
            $("#form-upload-file").on('change', function() {
                let formData = new FormData($("#form-upload")[0]);
                $.ajax({
                    url: "{{ route('profile.upload') }}",
                    type: 'post',
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function(res) {
                        window.location.reload();
                    }
                });
            })
        })
    </script>
@endpush
