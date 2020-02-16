@extends('frontend.layout.master')

@section('title')
    Cart
@endsection

@section('header-content')
    <div class="breadcrumbs-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumbs">
                        <h2>Giỏ hàng</h2>
                        <ul class="breadcrumbs-list">
                            <li>
                                <a title="Return to Home" href="{{route('frontend.home')}}">Home</a>
                            </li>
                            <li>Giỏ hàng</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="shopping-cart-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="wishlist-table-area table-responsive">
                        <table>
                            <thead>
                            <tr>
                                <th class="product-remove">Hàng động</th>
                                <th class="product-image">Ảnh</th>
                                <th class="t-product-name">Tên sản phẩm</th>
                                <th class="product-unit-price">Đơn giá</th>
                                <th class="product-quantity">Số Lượng</th>
                                <th class="product-subtotal">Thành tiền</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td class="product-remove">
                                        <form action="{{route('cart.delete',$item->rowId)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn_delete"
                                                    style="background: none; border: none; font-size: 30px">
                                                <i class="flaticon-delete"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td class="product-image">
                                        <a href="#">
                                            <img style="max-width: 50%"
                                                 src="{{asset('storage/images/product/avatar/'.$item->options['avatar'])}}"
                                                 alt="">
                                        </a>
                                    </td>
                                    <td class="t-product-name">
                                        <h3>
                                            <a href="{{route('frontend.detail',Str::slug($item->name))}}">{{$item->name}}</a>
                                        </h3>
                                    </td>
                                    <td class="product-unit-price">
                                        <p>{{$item->price}} vnđ</p>
                                    </td>
                                    <td class="product-quantity product-cart-details">
                                        <input type="number" value="{{$item->qty}}" class="qty_item">
                                    </td>
                                    <td class="product-quantity">
                                        <p>{{$item->qty * $item->price}} vnđ</p>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="shopingcart-bottom-area">
                        <a class="left-shoping-cart" href="{{url()->previous()}}">Tiếp tục mua hàng</a>
                        <div class="shopingcart-bottom-area pull-right">
                            <form action="{{route('cart.destroy')}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn_destroy">
                                    Xóa giỏ hàng
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart Area End -->
    <!-- Discount Area Start -->
    <div class="discount-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="discount-main-area">
                        <div class="discount-top">
                            <h3>Mã giảm giá</h3>
                            <p>Nhập vào mã giảm giá của sản phẩm</p>
                        </div>
                        <div class="discount-middle">
                            <input type="text" placeholder="">
                            <a class="" href="#">Nhập</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="subtotal-main-area">
                        <div class="subtotal-area">
                            <h2>Tổng tiền<span>{{Cart::instance('shoping')->subtotal()}} vnđ</span></h2>
                        </div>
                        <div class="subtotal-area">
                            <h2>Thuế<span>{{Cart::instance('shoping')->tax()}} vnđ</span></h2>
                        </div>
                        <div class="subtotal-area">
                            <h2>Thành tiền<span>{{Cart::instance('shoping')->total()}} vnđ</span></h2>
                        </div>
                        <a href="{{route('checkout.method')}}">Thanh Toán</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('.qty_item').change(function () {
                let qty = $('.qty_item').val();
                console.log(qty);
            })
        });
    </script>
@endsection

