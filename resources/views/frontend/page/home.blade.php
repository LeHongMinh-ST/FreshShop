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
                    <h2 class="title-1">Thực Phẩm Tươi Minh Tít</h2>
                </div>
                <!-- layer 2 -->
                <div class="layer-2">
                    <p class="title-2">Chúng tôi chuyên cung cấp các thực phẩm tươi ngon nhất đến tay người tiêu
                        dùng</p>
                </div>
                <!-- layer 3 -->
                <div class="layer-3">
                    <a href="{{route('frontend.about')}}" class="title-3">TÌM HIỂU THÊM</a>
                </div>
            </div>
            <!-- direction 2 -->
            <div id="slider-direction-2" class="slider-direction">
                <!-- layer 1 -->
                <div class="layer-1">
                    <h2 class="title-1">Thực phẩm tươi ngon cho mọi gia đình</h2>
                </div>
                <!-- layer 2 -->
                <div class="layer-2">
                    <p class="title-2"></p>
                </div>
                <!-- layer 3 -->
                <div class="layer-3">
                    <a href="{{route('frontend.about')}}" class="title-3">TÌM HIỂU THÊM</a>
                </div>
                ss
            </div>
        </div>
    </div>
    <!-- slider Area End-->
@endsection

@section('content')
    <div class="featured-product-area section-padding">
        <h2 class="section-title">Sản phẩm</h2>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-menu">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="first-item active">
                                <a href="#arrival" aria-controls="arrival" role="tab" data-toggle="tab">Sản phẩm mới</a>
                            </li>
                            <li role="presentation">
                                <a href="#sale" aria-controls="sale" role="tab" data-toggle="tab">Sản phẩm khuyến
                                    mãi</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="product-list tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="arrival">
                        <div class="featured-product-list indicator-style">
                            @for($i=0;$i<sizeof($products_new);$i+=2)
                                <div class="single-p-banner">
                                    <div class="col-md-3">
                                        <div class="single-banner">
                                            <div class="product-wrapper">
                                                <a href="{{route('frontend.detail',$products_new[$i]->slug)}}"
                                                   class="single-banner-image-wrapper">
                                                    @if($products_new[$i]->avatar)
                                                        <img alt=""
                                                             src="{{asset('storage/images/product/avatar/'.$products_new[$i]->avatar)}}"
                                                             style="height: 280px">
                                                    @else
                                                        <img alt=""
                                                             src="{{asset('backend/dist/img/product/avatar/demo.png')}}"
                                                             style="height: 280px">
                                                    @endif


                                                    <div class="price">
                                                        @if(isset($products_new[$i]->sale))
                                                            <span class="badge" style="background-color:red">sale</span>
                                                        @endif
                                                        <span class="badge" style="background-color:red">new</span>
                                                    </div>

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
                                                        <a href="#" title="Add to Wishlist">
                                                            <i class="fa fa-heart-o"></i>
                                                        </a>
                                                        <a href="" class="quickviewProduct"
                                                           data-product="{{$products_new[$i]->id}}" title="Quick view">
                                                            <i class="fa fa-compress"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="banner-bottom text-center">
                                                @if(isset($products_new[$i]->sale))
                                                    <p>
                                                        <strike>{{number_format($products_new[$i]->price_sell)}}</strike> {{number_format($products_new[$i]->sale)}}
                                                        vnđ</p>
                                                @else
                                                    <p>{{number_format($products_new[$i]->price_sell)}} vnđ</p>
                                                @endif
                                            </div>
                                            <div class="banner-bottom text-center">
                                                <a href="#">{{$products_new[$i]->name}}</a>
                                            </div>
                                        </div>
                                    </div>
                                    @if(isset($products_new[$i+1]))
                                        <div class="col-md-3">
                                            <div class="single-banner">
                                                <div class="product-wrapper">
                                                    <a href="{{route('frontend.detail',$products_new[$i+1]->slug)}}"
                                                       class="single-banner-image-wrapper">
                                                        @if($products_new[$i+1]->avatar)
                                                            <img alt=""
                                                                 src="{{asset('storage/images/product/avatar/'.$products_new[$i+1]->avatar)}}"
                                                                 style="height: 280px">
                                                        @else
                                                            <img alt=""
                                                                 src="{{asset('backend/dist/img/product/avatar/demo.png')}}"
                                                                 style="height: 280px">
                                                        @endif

                                                        <div class="price">
                                                            @if(isset($products_new[$i+1]->sale))
                                                                <span class="badge"
                                                                      style="background-color:red">sale</span>
                                                            @endif
                                                            <span class="badge" style="background-color:red">new</span>
                                                        </div>
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
                                                            <a href="#" title="Add to Wishlist">
                                                                <i class="fa fa-heart-o"></i>
                                                            </a>
                                                            <a href="" class="quickviewProduct"
                                                               data-product="{{$products_new[$i+1]->id}}"
                                                               title="Quick view">
                                                                <i class="fa fa-compress"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="banner-bottom text-center">
                                                    @if(isset($products_new[$i+1]->sale))
                                                        <p>
                                                            <strike>{{number_format($products_new[$i+1]->price_sell)}}</strike> {{number_format($products_new[$i+1]->sale)}}
                                                            vnđ</p>
                                                    @else
                                                        <p>{{number_format($products_new[$i+1]->price_sell)}} vnđ</p>
                                                    @endif
                                                </div>
                                                <div class="banner-bottom text-center">
                                                    <a href="#">{{$products_new[$i+1]->name}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endfor
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="sale">
                        <div class="featured-product-list indicator-style">
                            @for($i = 0;$i<sizeof($products_sale);$i+=2)
                                <div class="single-p-banner">
                                    @if(isset($products_sale[$i]->sale))
                                        <div class="col-md-3">
                                            <div class="single-banner">
                                                <div class="product-wrapper">
                                                    <a href="#" class="single-banner-image-wrapper">
                                                        @if($products_sale[$i]->avatar)
                                                            <img alt=""
                                                                 src="{{asset('storage/images/product/avatar/'.$products_sale[$i]->avatar)}}"
                                                                 style="height: 280px">
                                                        @else
                                                            <img alt=""
                                                                 src="{{asset('backend/dist/img/product/avatar/demo.png')}}"
                                                                 style="height: 280px">
                                                        @endif
                                                        @if(isset($products_sale[$i]->sale))
                                                            <div class="price"><span class="badge"
                                                                                     style="background-color:red">sale</span>
                                                            </div>
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
                                                            <a href="#" title="Add to Wishlist">
                                                                <i class="fa fa-heart-o"></i>
                                                            </a>
                                                            <a href="" class="quickviewProduct"
                                                               data-product="{{$products_sale[$i+1]->id}}"
                                                               title="Quick view">
                                                                <i class="fa fa-compress"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="banner-bottom text-center">
                                                    @if(isset($products_sale[$i+1]->sale))
                                                        <p>
                                                            <strike>{{number_format($products_sale[$i]->price_sell)}}</strike> {{number_format($products_sale[$i]->sale)}}
                                                            vnđ</p>
                                                    @else
                                                        <p>{{number_format($products_sale[$i]->price_sell)}} vnđ</p>
                                                    @endif
                                                </div>
                                                <div class="banner-bottom text-center">
                                                    <a href="#">{{$products_sale[$i+1]->name}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if(isset($products_sale[$i+1]->sale))
                                        <div class="col-md-3">
                                            <div class="single-banner">
                                                <div class="product-wrapper">
                                                    <a href="{{route('frontend.detail',$products_sale[$i+1]->slug)}}"
                                                       class="single-banner-image-wrapper">
                                                        @if($products_sale[$i+1]->avatar)
                                                            <img alt=""
                                                                 src="{{asset('storage/images/product/avatar/'.$products_sale[$i+1]->avatar)}}"
                                                                 style="height: 280px">
                                                        @else
                                                            <img alt=""
                                                                 src="{{asset('backend/dist/img/product/avatar/demo.png')}}"
                                                                 style="height: 280px">
                                                        @endif

                                                        @if(isset($products_sale[$i+1]->sale))
                                                            <div class="price"><span class="badge"
                                                                                     style="background-color:red">sale</span>
                                                            </div>
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
                                                            <a href="#" title="Add to Wishlist">
                                                                <i class="fa fa-heart-o"></i>
                                                            </a>
                                                            <a href="" class="quickviewProduct"
                                                               data-product="{{$products_sale[$i+1]->id}}"
                                                               title="Quick view">
                                                                <i class="fa fa-compress"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="banner-bottom text-center">
                                                    @if(isset($products_sale[$i+1]->sale))
                                                        <p>
                                                            <strike>{{number_format($products_sale[$i+1]->price_sell)}}</strike> {{number_format($products_sale[$i+1]->sale)}}
                                                            vnđ</p>
                                                    @else
                                                        <p>{{number_format($products_sale[$i+1]->price_sell)}} vnđ</p>
                                                    @endif
                                                </div>
                                                <div class="banner-bottom text-center">
                                                    <a href="#">{{$products_sale[$i+1]->name}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endfor
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
                                    <img id="quickImage" src="{{asset('frontend/img/quick-view.jpg')}}"
                                         style="height: 406px">
                                </div>
                            </div>
                            <div class="product-info">
                                <h1></h1>
                                <div class="price-box">
                                    <p class="s-price"><span class="special-price"><span
                                                class="amount"></span></span></p>
                                </div>
                                <a href="product-details.html" class="see-all">Xem chi tiết sản phẩm</a>
                                <div>
                                    <span style="color: green" class="alert-create"></span>
                                </div>

                                <div class="quick-add-to-cart">
                                    <form action="" method="POST" class="cart">
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        <div class="numbers-row">
                                            <input type="number" id="french-hens" value="1" min="1" name="qty">
                                        </div>
                                        <button class="single_add_to_cart_button" product_id="" type="submit">Thêm vào giỏ hàng
                                        </button>
                                    </form>
                                </div>
                                <div class="quick-desc">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est
                                    tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis
                                    justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id
                                    nulla.
                                </div>
                            </div><!-- .product-info -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

