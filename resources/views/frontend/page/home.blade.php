@extends('frontend.layout.master')

@section('title')
    Home
@endsection

@section('header-content')
    <!-- slider Area Start -->
    <div class="slider-area">
        <div class="bend niceties preview-1">
            <div id="ensign-nivoslider" class="slides">
                <img src="{{asset('frontend/img/slider/sl1.jpg')}}" alt="" title="#slider-direction-1"/>
                <img src="{{asset('frontend/img/slider/sl2.jpg')}}" alt="" title="#slider-direction-2"/>
            </div>
            <!-- direction 1 -->
            <div id="slider-direction-1" class="text-center slider-direction">
                <!-- layer 1 -->
                <div class="layer-1">
                    <h2 class="title-1">LET’S WRITE IMAGINE</h2>
                </div>
                <!-- layer 2 -->
                <div class="layer-2">
                    <p class="title-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <!-- layer 3 -->
                <div class="layer-3">
                    <a href="#" class="title-3">SEE MORE</a>
                </div>
                <!-- layer 4 -->
                <div class="layer-4">
                    <form action="#" class="title-4">
                        <input type="text" placeholder="Enter your book title here">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
            <!-- direction 2 -->
            <div id="slider-direction-2" class="slider-direction">
                <!-- layer 1 -->
                <div class="layer-1">
                    <h2 class="title-1">LET’S WRITE IMAGINE</h2>
                </div>
                <!-- layer 2 -->
                <div class="layer-2">
                    <p class="title-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <!-- layer 3 -->
                <div class="layer-3">
                    <a href="#" class="title-3">SEE MORE</a>
                </div>
                <!-- layer 4 -->
                <div class="layer-4">
                    <form action="#" class="title-4">
                        <input type="text" placeholder="Enter your book title here">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->
@endsection

@section('content')
    <!-- Online Banner Area Start -->
    <div class="online-banner-area">
        <div class="container">
            <div class="banner-title text-center">
                <h2>ONLINE <span>FRESH STORE</span></h2>
                <p>The Guide is the biggest big store and the biggest books library in the world that has
                    alot of the popular and the most top category books presented here. Top Authors are here just
                    subscribe your email address and get updated with us.</p>
            </div>
        </div>
    </div>
{{--    <!-- Online Banner Area End -->--}}
{{--    <!-- Shop Info Area Start -->--}}
{{--    <div class="shop-info-area">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-4 col-sm-6">--}}
{{--                    <div class="single-shop-info">--}}
{{--                        <div class="shop-info-icon">--}}
{{--                            <i class="flaticon-transport"></i>--}}
{{--                        </div>--}}
{{--                        <div class="shop-info-content">--}}
{{--                            <h2>FREE SHIPPING</h2>--}}
{{--                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. </p>--}}
{{--                            <a href="#">READ MORE</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-4 col-sm-6">--}}
{{--                    <div class="single-shop-info">--}}
{{--                        <div class="shop-info-icon">--}}
{{--                            <i class="flaticon-money"></i>--}}
{{--                        </div>--}}
{{--                        <div class="shop-info-content">--}}
{{--                            <h2>FREE SHIPPING</h2>--}}
{{--                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. </p>--}}
{{--                            <a href="#">READ MORE</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-4 hidden-sm">--}}
{{--                    <div class="single-shop-info">--}}
{{--                        <div class="shop-info-icon">--}}
{{--                            <i class="flaticon-school"></i>--}}
{{--                        </div>--}}
{{--                        <div class="shop-info-content">--}}
{{--                            <h2>FREE SHIPPING</h2>--}}
{{--                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. </p>--}}
{{--                            <a href="#">READ MORE</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- Shop Info Area End -->--}}
{{--    <!-- Featured Product Area Start -->--}}
    <div class="featured-product-area section-padding">
        <h2 class="section-title">Sản phẩm</h2>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-menu">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="first-item active">
                                <a href="#arrival" aria-controls="arrival" role="tab" data-toggle="tab">New Arrival</a>
                            </li>
                            <li role="presentation">
                                <a href="#sale" aria-controls="sale" role="tab" data-toggle="tab">BEST SELLERS</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="product-list tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="arrival">
                        <div class="featured-product-list indicator-style">
                            @foreach($products as $product)
                                <div class="single-p-banner">
                                    <div class="col-md-3">
                                        <div class="single-banner">
                                            <div class="product-wrapper">
                                                <a href="{{route('frontend.detail',$product->slug)}}"
                                                   class="single-banner-image-wrapper">
                                                    @if($product->avatar)
                                                        <img alt=""
                                                             src="{{asset('backend/dist/img/product/avatar/'.$product->avatar)}}">
                                                    @else
                                                        <img alt=""
                                                             src="{{asset('backend/dist/img/product/avatar/demo.png')}}">
                                                    @endif
                                                    <div class="rating-icon">
                                                        <i class="fa fa-star icolor"></i>
                                                        <i class="fa fa-star icolor"></i>
                                                        <i class="fa fa-star icolor"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </a>
                                                <div class="product-description">
                                                    <div class="functional-buttons">
                                                        <a href="#" title="Add to Cart">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </a>
                                                        <a href="#" title="Add to Wishlist">
                                                            <i class="fa fa-heart-o"></i>
                                                        </a>
                                                        <a href="#" title="Quick view" data-toggle="modal"
                                                           data-target="#productModal">
                                                            <i class="fa fa-compress"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="banner-bottom text-center">
                                                <a href="#">{{$product->price_sell}} đ</a>
                                            </div>
                                            <div class="banner-bottom text-center">
                                                <a href="#">{{$product->name}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="sale">
                        <div class="featured-product-list indicator-style">
                            <div class="single-p-banner">
                                <div class="col-md-3">
                                    <div class="single-banner">
                                        <div class="product-wrapper">
                                            <a href="#" class="single-banner-image-wrapper">
                                                <img alt="" src="{{asset('frontend/img/featured/2.jpg')}}">
                                                <div class="price"><span>$</span>160</div>
                                                <div class="rating-icon">
                                                    <i class="fa fa-star icolor"></i>
                                                    <i class="fa fa-star icolor"></i>
                                                    <i class="fa fa-star icolor"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </a>
                                            <div class="product-description">
                                                <div class="functional-buttons">
                                                    <a href="#" title="Add to Cart">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </a>
                                                    <a href="#" title="Add to Wishlist">
                                                        <i class="fa fa-heart-o"></i>
                                                    </a>
                                                    <a href="#" title="Quick view" data-toggle="modal"
                                                       data-target="#productModal">
                                                        <i class="fa fa-compress"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="banner-bottom text-center">
                                            <a href="#">People of the book</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="single-banner">
                                        <div class="product-wrapper">
                                            <a href="#" class="single-banner-image-wrapper">
                                                <img alt="" src="{{asset('frontend/img/featured/6.jpg')}}">
                                                <div class="price"><span>$</span>160</div>
                                                <div class="rating-icon">
                                                    <i class="fa fa-star icolor"></i>
                                                    <i class="fa fa-star icolor"></i>
                                                    <i class="fa fa-star icolor"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </a>
                                            <div class="product-description">
                                                <div class="functional-buttons">
                                                    <a href="#" title="Add to Cart">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </a>
                                                    <a href="#" title="Add to Wishlist">
                                                        <i class="fa fa-heart-o"></i>
                                                    </a>
                                                    <a href="#" title="Quick view" data-toggle="modal"
                                                       data-target="#productModal">
                                                        <i class="fa fa-compress"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="banner-bottom text-center">
                                            <a href="#">Cold mountain</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-p-banner">
                                <div class="col-md-3">
                                    <div class="single-banner">
                                        <div class="product-wrapper">
                                            <a href="#" class="single-banner-image-wrapper">
                                                <img alt="" src="{{asset('frontend/img/featured/3.jpg')}}">
                                                <div class="price"><span>$</span>160</div>
                                                <div class="rating-icon">
                                                    <i class="fa fa-star icolor"></i>
                                                    <i class="fa fa-star icolor"></i>
                                                    <i class="fa fa-star icolor"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </a>
                                            <div class="product-description">
                                                <div class="functional-buttons">
                                                    <a href="#" title="Add to Cart">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </a>
                                                    <a href="#" title="Add to Wishlist">
                                                        <i class="fa fa-heart-o"></i>
                                                    </a>
                                                    <a href="#" title="Quick view" data-toggle="modal"
                                                       data-target="#productModal">
                                                        <i class="fa fa-compress"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="banner-bottom text-center">
                                            <a href="#">The secret letter</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="single-banner">
                                        <div class="product-wrapper">
                                            <a href="#" class="single-banner-image-wrapper">
                                                <img alt="" src="{{asset('frontend/img/featured/7.jpg')}}">
                                                <div class="price"><span>$</span>160</div>
                                                <div class="rating-icon">
                                                    <i class="fa fa-star icolor"></i>
                                                    <i class="fa fa-star icolor"></i>
                                                    <i class="fa fa-star icolor"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </a>
                                            <div class="product-description">
                                                <div class="functional-buttons">
                                                    <a href="#" title="Add to Cart">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </a>
                                                    <a href="#" title="Add to Wishlist">
                                                        <i class="fa fa-heart-o"></i>
                                                    </a>
                                                    <a href="#" title="Quick view" data-toggle="modal"
                                                       data-target="#productModal">
                                                        <i class="fa fa-compress"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="banner-bottom text-center">
                                            <a href="#">The historian</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-p-banner">
                                <div class="col-md-3">
                                    <div class="single-banner">
                                        <div class="product-wrapper">
                                            <a href="#" class="single-banner-image-wrapper">
                                                <img alt="" src="{{asset('frontend/img/featured/4.jpg')}}">
                                                <div class="price"><span>$</span>160</div>
                                                <div class="rating-icon">
                                                    <i class="fa fa-star icolor"></i>
                                                    <i class="fa fa-star icolor"></i>
                                                    <i class="fa fa-star icolor"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </a>
                                            <div class="product-description">
                                                <div class="functional-buttons">
                                                    <a href="#" title="Add to Cart">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </a>
                                                    <a href="#" title="Add to Wishlist">
                                                        <i class="fa fa-heart-o"></i>
                                                    </a>
                                                    <a href="#" title="Quick view" data-toggle="modal"
                                                       data-target="#productModal">
                                                        <i class="fa fa-compress"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="banner-bottom text-center">
                                            <a href="#">Lone some dove</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="single-banner">
                                        <div class="product-wrapper">
                                            <a href="#" class="single-banner-image-wrapper">
                                                <img alt="" src="{{asset('frontend/img/featured/8.jpg')}}">
                                                <div class="price"><span>$</span>160</div>
                                                <div class="rating-icon">
                                                    <i class="fa fa-star icolor"></i>
                                                    <i class="fa fa-star icolor"></i>
                                                    <i class="fa fa-star icolor"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </a>
                                            <div class="product-description">
                                                <div class="functional-buttons">
                                                    <a href="#" title="Add to Cart">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </a>
                                                    <a href="#" title="Add to Wishlist">
                                                        <i class="fa fa-heart-o"></i>
                                                    </a>
                                                    <a href="#" title="Quick view" data-toggle="modal"
                                                       data-target="#productModal">
                                                        <i class="fa fa-compress"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="banner-bottom text-center">
                                            <a href="#">The secret garden</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-p-banner">
                                <div class="col-md-3">
                                    <div class="single-banner">
                                        <div class="product-wrapper">
                                            <a href="#" class="single-banner-image-wrapper">
                                                <img alt="" src="{{asset('frontend/img/featured/1.jpg')}}">
                                                <div class="price"><span>$</span>160</div>
                                                <div class="rating-icon">
                                                    <i class="fa fa-star icolor"></i>
                                                    <i class="fa fa-star icolor"></i>
                                                    <i class="fa fa-star icolor"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </a>
                                            <div class="product-description">
                                                <div class="functional-buttons">
                                                    <a href="#" title="Add to Cart">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </a>
                                                    <a href="#" title="Add to Wishlist">
                                                        <i class="fa fa-heart-o"></i>
                                                    </a>
                                                    <a href="#" title="Quick view" data-toggle="modal"
                                                       data-target="#productModal">
                                                        <i class="fa fa-compress"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="banner-bottom text-center">
                                            <a href="#">East of eden</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="single-banner">
                                        <div class="product-wrapper">
                                            <a href="#" class="single-banner-image-wrapper">
                                                <img alt="" src="{{asset('frontend/img/featured/5.jpg')}}">
                                                <div class="price"><span>$</span>160</div>
                                                <div class="rating-icon">
                                                    <i class="fa fa-star icolor"></i>
                                                    <i class="fa fa-star icolor"></i>
                                                    <i class="fa fa-star icolor"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </a>
                                            <div class="product-description">
                                                <div class="functional-buttons">
                                                    <a href="#" title="Add to Cart">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </a>
                                                    <a href="#" title="Add to Wishlist">
                                                        <i class="fa fa-heart-o"></i>
                                                    </a>
                                                    <a href="#" title="Quick view" data-toggle="modal"
                                                       data-target="#productModal">
                                                        <i class="fa fa-compress"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="banner-bottom text-center">
                                            <a href="#">The historian</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-p-banner">
                                <div class="col-md-3">
                                    <div class="single-banner">
                                        <div class="product-wrapper">
                                            <a href="#" class="single-banner-image-wrapper">
                                                <img alt="" src="{{asset('frontend/img/featured/1.jpg')}}">
                                                <div class="price"><span>$</span>160</div>
                                                <div class="rating-icon">
                                                    <i class="fa fa-star icolor"></i>
                                                    <i class="fa fa-star icolor"></i>
                                                    <i class="fa fa-star icolor"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </a>
                                            <div class="product-description">
                                                <div class="functional-buttons">
                                                    <a href="#" title="Add to Cart">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </a>
                                                    <a href="#" title="Add to Wishlist">
                                                        <i class="fa fa-heart-o"></i>
                                                    </a>
                                                    <a href="#" title="Quick view" data-toggle="modal"
                                                       data-target="#productModal">
                                                        <i class="fa fa-compress"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="banner-bottom text-center">
                                            <a href="#">East of eden</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="single-banner">
                                        <div class="product-wrapper">
                                            <a href="#" class="single-banner-image-wrapper">
                                                <img alt="" src="{{asset('frontend/img/featured/5.jpg')}}">
                                                <div class="price"><span>$</span>160</div>
                                                <div class="rating-icon">
                                                    <i class="fa fa-star icolor"></i>
                                                    <i class="fa fa-star icolor"></i>
                                                    <i class="fa fa-star icolor"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </a>
                                            <div class="product-description">
                                                <div class="functional-buttons">
                                                    <a href="#" title="Add to Cart">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </a>
                                                    <a href="#" title="Add to Wishlist">
                                                        <i class="fa fa-heart-o"></i>
                                                    </a>
                                                    <a href="#" title="Quick view" data-toggle="modal"
                                                       data-target="#productModal">
                                                        <i class="fa fa-compress"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="banner-bottom text-center">
                                            <a href="#">The historian</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-p-banner">
                                <div class="col-md-3">
                                    <div class="single-banner">
                                        <div class="product-wrapper">
                                            <a href="#" class="single-banner-image-wrapper">
                                                <img alt="" src="{{asset('frontend/img/featured/4.jpg')}}">
                                                <div class="price"><span>$</span>160</div>
                                                <div class="rating-icon">
                                                    <i class="fa fa-star icolor"></i>
                                                    <i class="fa fa-star icolor"></i>
                                                    <i class="fa fa-star icolor"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </a>
                                            <div class="product-description">
                                                <div class="functional-buttons">
                                                    <a href="#" title="Add to Cart">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </a>
                                                    <a href="#" title="Add to Wishlist">
                                                        <i class="fa fa-heart-o"></i>
                                                    </a>
                                                    <a href="#" title="Quick view" data-toggle="modal"
                                                       data-target="#productModal">
                                                        <i class="fa fa-compress"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="banner-bottom text-center">
                                            <a href="#">East of eden</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="single-banner">
                                        <div class="product-wrapper">
                                            <a href="#" class="single-banner-image-wrapper">
                                                <img alt="" src="{{asset('frontend/img/featured/8.jpg')}}">
                                                <div class="price"><span>$</span>160</div>
                                                <div class="rating-icon">
                                                    <i class="fa fa-star icolor"></i>
                                                    <i class="fa fa-star icolor"></i>
                                                    <i class="fa fa-star icolor"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </a>
                                            <div class="product-description">
                                                <div class="functional-buttons">
                                                    <a href="#" title="Add to Cart">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </a>
                                                    <a href="#" title="Add to Wishlist">
                                                        <i class="fa fa-heart-o"></i>
                                                    </a>
                                                    <a href="#" title="Quick view" data-toggle="modal"
                                                       data-target="#productModal">
                                                        <i class="fa fa-compress"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="banner-bottom text-center">
                                            <a href="#">The historian</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured Product Area End -->
    <!-- Testimonial Area Start -->
    <div class="testimonial-area text-center">
        <div class="container">
            <div class="testimonial-title">
                <h2>OUR TESTIMONIAL</h2>
                <p>What our clients say about the books reviews and comments</p>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="testimonial-list">
                        <div class="single-testimonial">
                            <img src="{{asset('frontend/img/testimonial/1.jpg')}}" alt="">
                            <div class="testmonial-info clearfix">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation. </p>
                                <div class="testimonial-author text-center">
                                    <h3>JOHN DOE</h3>
                                    <p>The Author</p>
                                </div>
                            </div>
                        </div>
                        <div class="single-testimonial">
                            <img src="{{asset('frontend/img/testimonial/2.jpg')}}" alt="">
                            <div class="testmonial-info clearfix">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation. </p>
                                <div class="testimonial-author text-center">
                                    <h3>Ashim Kumar</h3>
                                    <p>CEO</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="blog-area section-padding">
        <h2 class="section-title">Món ngón mỗi ngày</h2>
        <p>The Latest Blog post for the biggest Blog for the books Library.</p>
        <div class="container">
            <div class="row">
                <div class="blog-list indicator-style">
                    <div class="col-md-3">
                        <div class="single-blog">
                            <a href="single-#">
                                <img src="{{asset('frontend/img/blog/1.jpg')}}" alt="">
                            </a>
                            <div class="blog-info text-center">
                                <a href="#"><h2>Modern Book Reviews</h2></a>
                                <div class="blog-info-bottom">
                                    <span class="blog-author">BY: <a href="#">LATEST BLOG</a></span>
                                    <span class="blog-date">19TH JAN 2016</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="single-blog">
                            <a href="single-#">
                                <img src="{{asset('frontend/img/blog/2.jpg')}}" alt="">
                            </a>
                            <div class="blog-info text-center">
                                <a href="#"><h2>Modern Book Reviews</h2></a>
                                <div class="blog-info-bottom">
                                    <span class="blog-author">BY: <a href="#">ZARIF SUNI</a></span>
                                    <span class="blog-date">19TH JAN 2016</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="single-blog">
                            <a href="single-#">
                                <img src="{{asset('frontend/img/blog/3.jpg')}}" alt="">
                            </a>
                            <div class="blog-info text-center">
                                <a href="#"><h2>Modern Book Reviews</h2></a>
                                <div class="blog-info-bottom">
                                    <span class="blog-author">BY: <a href="#">ZARIF SUNI</a></span>
                                    <span class="blog-date">19TH JAN 2016</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="single-blog">
                            <a href="single-#">
                                <img src="{{asset('frontend/img/blog/4.jpg')}}" alt="">
                            </a>
                            <div class="blog-info text-center">
                                <a href="#"><h2>Modern Book Reviews</h2></a>
                                <div class="blog-info-bottom">
                                    <span class="blog-author">BY: <a href="#">ZARIF SUNI</a></span>
                                    <span class="blog-date">19TH JAN 2016</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="single-blog">
                            <a href="single-#">
                                <img src="{{asset('frontend/img/blog/1.jpg')}}" alt="">
                            </a>
                            <div class="blog-info text-center">
                                <a href="#"><h2>Modern Book Reviews</h2></a>
                                <div class="blog-info-bottom">
                                    <span class="blog-author">BY: <a href="#">ZARIF SUNI</a></span>
                                    <span class="blog-date">19TH JAN 2016</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="single-blog">
                            <a href="single-#">
                                <img src="{{asset('frontend/img/blog/2.jpg')}}" alt="">
                            </a>
                            <div class="blog-info text-center">
                                <a href="#"><h2>Modern Book Reviews</h2></a>
                                <div class="blog-info-bottom">
                                    <span class="blog-author">BY: <a href="#">ZARIF SUNI</a></span>
                                    <span class="blog-date">19TH JAN 2016</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    <div id="quickview-wrapper">
        <!-- Modal -->
        <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-product">
                            <div class="product-images">
                                <div class="main-image images">
                                    <img alt="" src="{{asset('frontend/img/quick-view.jpg')}}">
                                </div>
                            </div>
                            <div class="product-info">
                                <h1>Frame Princes Cut Diamond</h1>
                                <div class="price-box">
                                    <p class="s-price"><span class="special-price"><span
                                                class="amount">$280.00</span></span></p>
                                </div>
                                <a href="product-details.html" class="see-all">See all features</a>
                                <div class="quick-add-to-cart">
                                    <form method="post" class="cart">
                                        <div class="numbers-row">
                                            <input type="number" id="french-hens" value="3">
                                        </div>
                                        <button class="single_add_to_cart_button" type="submit">Add to cart</button>
                                    </form>
                                </div>
                                <div class="quick-desc">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est
                                    tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis
                                    justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id
                                    nulla.
                                </div>
                                <div class="social-sharing">
                                    <div class="widget widget_socialsharing_widget">
                                        <h3 class="widget-title-modal">Share this product</h3>
                                        <ul class="social-icons">
                                            <li><a target="_blank" title="Facebook" href="#"
                                                   class="facebook social-icon"><i class="fa fa-facebook"></i></a></li>
                                            <li><a target="_blank" title="Twitter" href="#" class="twitter social-icon"><i
                                                        class="fa fa-twitter"></i></a></li>
                                            <li><a target="_blank" title="Pinterest" href="#"
                                                   class="pinterest social-icon"><i class="fa fa-pinterest"></i></a>
                                            </li>
                                            <li><a target="_blank" title="Google +" href="#"
                                                   class="gplus social-icon"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a target="_blank" title="LinkedIn" href="#"
                                                   class="linkedin social-icon"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- .product-info -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
