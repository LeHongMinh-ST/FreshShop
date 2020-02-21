@extends('frontend.layout.master')

@section('title')
    Contact
@endsection

@section('header-content')
    <div class="breadcrumbs-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div style="background: none;padding-top: 140px;padding-bottom: 140px;">
                        <h2 style="color: #000000">Liên hệ</h2>
                        <ul class="breadcrumbs-list">
                            <li>
                                <a title="Return to Home" href="{{route('frontend.home')}}">Home</a>
                            </li>
                            <li>Liên hệ</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="address-info-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-4 hidden-sm">
                    <div class="address-single">
                        <div class="all-adress-info">
                            <div class="icon">
                                <span><i class="fa fa-user-plus"></i></span>
                            </div>
                            <div class="info">
                                <h3>Số điện thoại</h3>
                                <p>+(02) 0974798960</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="address-single">
                        <div class="all-adress-info">
                            <div class="icon">
                                <span><i class="fa fa-map-marker"></i></span>
                            </div>
                            <div class="info">
                                <h3>Địa chỉ</h3>
                                <p>29 Đường Trâu Quỳ</p>
                                <p>Gia Lâm, Hà Nội</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="address-single no-margin">
                        <div class="all-adress-info">
                            <div class="icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="info">
                                <h3>E-mail</h3>
                                <p>minhhl298.st@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Address Information Area End -->
@endsection


