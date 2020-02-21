@extends('frontend.layout.master')

@section('title')
    Success
@endsection

@section('header-content')
    <div class="breadcrumbs-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumbs">
                        <h2>Thanh toán thành công</h2>
                        <ul class="breadcrumbs-list">
                            <li>
                                <a title="Return to Home" href="{{route('frontend.home')}}">Home</a>
                            </li>
                            <li>Thanh toán</li>
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
                                <th class="t-product-name">Tên sản phẩm</th>
                                <th class="product-unit-price">Đơn giá</th>
                                <th class="product-quantity">Số Lượng</th>
                                <th class="product-subtotal">Thành tiền</th>
                                <th>Đánh giá</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($oder->Products as $item)
                                <tr>
                                    <td class="t-product-name">
                                        <h3>
                                            <a href="{{route('frontend.detail',Str::slug($item->name))}}">{{$item->name}}</a>
                                        </h3>
                                    </td>
                                    <td class="product-unit-price">
                                        <p>{{$item->pivot->unit_price}} vnđ</p>
                                    </td>
                                    <td class="product-quantity product-cart-details">
                                        <input type="number" value="{{$item->pivot->quantity}}" name="qty"
                                               class="qty_item"
                                               style="text-align: center ; width: 60px" disabled>
                                    </td>
                                    <td class="product-quantity">
                                        <p>{{$item->pivot->unit_price * $item->pivot->quantity}} vnđ</p>
                                    </td>
                                    <td>
                                        <a href="">Đánh giá</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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
                            <h3>Người gửi:</h3>
                            <p>FresShop</p>
                            <p>Địa chỉ: 29 Trâu Quỳ,Gia Lâm,Hà Nội</p>
                        </div>
                        <div class="discount-middle">
                            <h4>Người nhận:</h4>
                            @if(isset($oder))
                                <p>{{$oder->name}}</p>
                                <p>Địa chỉ: {{$oder->address}}</p>
                                <p>Số điện thoại: {{$oder->phone}}</p>
                                <p>Email: {{$oder->email}}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="subtotal-main-area">
                        <div class="subtotal-area">
                            <h2>Tổng tiền<span>{{$oder->payment}} vnđ</span></h2>
                        </div>
                        <a href="{{route('frontend.home')}}">Tiếp tục mua hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


