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
                        <h2>Quên mật khẩu</h2>
                        <ul class="breadcrumbs-list">
                            <li>
                                <a title="Return to Home" href="{{route('frontend.home')}}">Home</a>
                            </li>
                            <li>quên mật khẩu</li>
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
                            Quên mật khẩu
                        </h2>
                        <p class="form-row">
                            <label>Vui lòng nhập vào Email để lấy lại mật khẩu:</label>
                            <input type="email" placeholder="Nhập vào Email" name="email">
                        </p>
                        <div class="submit">
                            <button type="submit" class="btn-default">
                                    <span>
                                        <i class="fa fa-user left"></i>
                                        Gửi mật khẩu
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


