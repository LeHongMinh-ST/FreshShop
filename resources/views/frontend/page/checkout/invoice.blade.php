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
                                    @guest
                                        <a role="button" data-toggle="collapse" data-parent="#accordion"
                                           href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <span>1</span>
                                            Thanh toán với phương thức khách hàng
                                        </a>
                                    @else
                                        <a role="button" data-toggle="collapse" data-parent="#accordion"
                                           href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <span>1</span>
                                            Thanh toán với tài khoản: {{Auth::user()->name}}
                                        </a>
                                    @endguest
                                </h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                        <span>2</span>
                                        Thông tin thanh toán
                                </h4>
                            </div>
                            <form action="{{route('checkout.store')}}" method="post">
                                @csrf
                                <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel"
                                     aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="form-row">
                                                    <label>Tên người nhận</label>
                                                    <input type="text" placeholder="Tên người nhận *"
                                                           value="@auth {{Auth::user()->name}} @endauth" name="name">
                                                </p>
                                                @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-12">
                                                <p class="form-row">
                                                    <label>Địa chỉ nhận hàng</label>
                                                    <input type="text" placeholder="Địa chỉ nhận hàng" value="" name="address">
                                                </p>
                                                @error('address')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <p class="form-row">
                                                    <label>Địa chỉ email</label>
                                                    <input type="email" placeholder="Địa chỉ email *"
                                                           value="@auth {{Auth::user()->email}} @endauth" name="email">
                                                </p>
                                                @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <p class="form-row">
                                                    <label>Số điện thoại nhận hàng</label>
                                                    <input type="text" placeholder="Số điện thoại *"
                                                           value="@auth {{Auth::user()->phone}} @endauth" name="phone">
                                                </p>
                                                @error('phone')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-12">
                                                <p class="form-row">
                                                    <label>Ghi chú</label>
                                                    <textarea style="resize: vertical" class="note_payment" name="note" id="" cols="30" rows="2"></textarea>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="order-review" id="checkout-review">
                                        <div class="table-responsive" id="checkout-review-table-wrapper">
                                            <table class="data-table" id="checkout-review-table">
                                                <thead>
                                                <tr>
                                                    <th rowspan="1">Tên sản phẩm</th>
                                                    <th colspan="1">Đơn giá</th>
                                                    <th rowspan="1">Số lượng</th>
                                                    <th colspan="1">Tạm tính</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($items as $item)
                                                    <tr>
                                                        <td><h3 class="product-name">{{$item->name}}</h3></td>
                                                        <td><span class="cart-price"><span
                                                                    class="check-price">{{$item->price}} vnđ</span></span></td>
                                                        <td>1</td>
                                                        <!-- sub total starts here -->
                                                        <td><span class="cart-price"><span
                                                                    class="check-price">{{$item->price*$item->qty}} vnđ</span></span></td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <td colspan="3">Tổng tiền</td>
                                                    <td><span class="check-price">{{Cart::instance('shopping')->subtotal()}} vnđ</span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">Thuế</td>
                                                    <td><span class="check-price">{{Cart::instance('shopping')->tax()}} vnđ</span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3"><strong>Thành tiền</strong></td>
                                                    <td><strong><span class="check-price">{{Cart::instance('shopping')->total()}} vnđ</span></strong></td>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <div id="checkout-review-submit">
                                            <div class="cart-btn-3" id="review-buttons-container">
                                                <p class="left">Bỏ sót sản phẩm? <a href="{{route('cart.index')}}">Thay đổi lại giỏ hàng</a></p>
                                                <button type="submit" class="btn btn-default"><span>Tiến hành đặt hàng</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

