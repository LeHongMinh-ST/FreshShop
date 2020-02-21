@extends('frontend.layout.master')

@section('title')
    Login
@endsection

@section('header-content')
    <div class="breadcrumbs-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumbs">
                        <h2>Đăng nhập</h2>
                        <ul class="breadcrumbs-list">
                            <li>
                                <a title="Return to Home" href="{{route('frontend.home')}}">Home</a>
                            </li>
                            <li>Đăng nhập</li>
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
                    <form action="{{route('login.store')}}" class="create-account-form" method="post">
                        @csrf
                        <h2 class="heading-title">
                            Đăng nhập
                        </h2>
                        <p class="form-row">
                            <label>Email:</label>
                            <input type="email" placeholder="Nhập vào Email" name="email">
                        </p>
                        <p class="form-row">
                            <label>Mật khẩu:</label>
                            <input type="password" placeholder="Nhập vào mật khẩu" name="password">
                        </p>
                        <p class="lost-password form-group">
                            <a href="{{route('register.form')}}" rel="nofollow">Bạn chưa có tài khoản ?</a>
                        </p>
                        <p class="lost-password form-group">
                            <a href="{{route('forgot.form')}}" rel="nofollow">Quên mật khẩu ?</a>
                        </p>
                        <div class="submit">
                            <button type="submit" class="btn-default">
                                    <span>
                                        <i class="fa fa-user left"></i>
                                        Đăng nhập
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

