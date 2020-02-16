@extends('frontend.layout.master')

@section('title')
@endsection

@section('header-content')
    <div class="breadcrumbs-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumbs">
                        <h2>Checkout</h2>
                        <ul class="breadcrumbs-list">
                            <li>
                                <a title="Return to Home" href="index.html">Home</a>
                            </li>
                            <li>Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="check-out-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion"
                                       aria-expanded="true" aria-controls="collapseOne">
                                        <span>1</span>
                                        Chọn phương thức thanh toán
                                    </a>
                                </h4>
                            </div>
                            @guest
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                                     aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="checkout-collapse-inner">
                                                    <h2 class="collapse-title">Chọn phượng thức</h2>
                                                    <h4 class="collapse-sub-title">Đăng kí tài khoản hoặc thanh toán
                                                        ngay:</h4>
                                                    <form action="{{route('checkout.get_method')}}" method="get">
                                                        @csrf
                                                        <input type="radio" value="0" name="method"/>
                                                        <label>Thanh toán ngay</label>
                                                        <br>
                                                        <input type="radio" value="1" name="method"/>
                                                        <label>Đăng kí tài khoản</label>
                                                        <br>
                                                        <button class="btn btn-default btn-checkout">Tiếp tục</button>
                                                    </form>

                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="checkout-collapse-inner">
                                                    <h2 class="collapse-title">Đăng nhập</h2>
                                                    <h4 class="collapse-sub-title">Bạn đã có tài khoản?</h4>
                                                    <form action="{{route('login.store')}}" method="post">
                                                        @csrf
                                                        <div class="form-row">
                                                            <input type="email" placeholder="Email Address*"
                                                                   name="email"/>
                                                        </div>
                                                        <div class="form-row">
                                                            <input type="password" placeholder="Password*"
                                                                   name="password"/>
                                                        </div>
                                                        <div class="check-register login-button">
                                                            <a href="#">Quên mật khẩu</a>
                                                            <button class="btn btn-default" type="submit">
                                                                Đăng nhập
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endguest
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <span>2</span>
                                        Thông tin thanh toán
                                    </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
