@extends('frontend.layout.master')

@section('title')
    Register
@endsection

@section('header-content')
    <div class="breadcrumbs-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumbs">
                        <h2>Đăng kí tài khoản</h2>
                        <ul class="breadcrumbs-list">
                            <li>
                                <a title="Return to Home" href="{{route('frontend.home')}}">Home</a>
                            </li>
                            <li>Đăng kí</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
            <div class="login-account section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <form action="{{route('register.store')}}" class="create-account-form" method="post">
                                @csrf
                                <h2 class="heading-title">
                                    Đăng kí
                                </h2>
                                <p class="form-row">
                                    <label>Họ và tên:</label>
                                    <input type="name" placeholder="Nhập vào họ và tên" name="name">
                                </p>
                                <p class="form-row">
                                    <label>Email:</label>
                                    <input type="email" placeholder="Nhập vào Email" name="email">
                                </p>
                                <p class="form-row">
                                    <label>Mật khẩu:</label>
                                    <input type="password" placeholder="Nhập vào mật khẩu" name="password">
                                </p>
                                <p class="form-row">
                                    <label>Nhập lại mật khẩu:</label>
                                    <input type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu">
                                </p>
                                <p class="form-row">
                                    <label>Số điện thoại:</label>
                                    <input type="text" placeholder="Nhập vào số điện thoại" name="phone">
                                </p >
                                <p class="form-row">
                                    <label>Địa chỉ:</label>
                                    <input type="text" placeholder="Nhập vào địa chỉ" name="address">
                                </p>
                                <p class="lost-password form-group">
                                    <a href="{{route('login.form-guest')}}" rel="nofollow">Bạn đã có tài khoản ?</a>
                                </p>
                                <div class="submit">
                                    <button type="submit" class="btn-default">
                                    <span>
                                        <i class="fa fa-user left"></i>
                                        Đăng kí
                                    </span>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </div>
            </div>
@endsection

