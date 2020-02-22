@extends('frontend.layout.master')

@section('titlie')
    Product
@endsection

@section('header-content')
    <div class="breadcrumbs-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div style="background: none;padding-top: 140px;padding-bottom: 140px;">
                        @if($category->name)
                            <h2 style="color: #000000">{{$category->name}}</h2>
                        @else
                            <h2 style="color: #000000">Sản phẩm</h2>
                        @endif
                        <ul class="breadcrumbs-list">
                            <li>
                                <a title="Return to Home" href="{{route('frontend.home')}}">Home</a>
                            </li>
                            <li>{{$category->name}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="shopping-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="shop-widget">
                        <div class="shop-widget-top">
                            <aside class="widget widget-categories">
                                <h2 class="sidebar-title text-center">Danh mục</h2>
                                <ul class="sidebar-menu">
                                    @foreach($categories_parent as $category_parent)
                                        <li>
                                            <a href="{{route('frontend.products',$category_parent->slug)}}">
                                                <i class="fa fa-angle-double-right"></i>
                                                {{$category_parent->name}}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </aside>
                            <aside class="widget shop-filter">
                                <h2 class="sidebar-title text-center">PRICE SLIDER</h2>
                                <div class="info-widget">
                                    <div class="price-filter">
                                        <div id="slider-range"></div>
                                        <div class="price-slider-amount">
                                            <input type="text" id="amount" name="price" placeholder="Add Your Price"/>
                                            <div class="widget-buttom">
                                                <input type="submit" value="Filter"/>
                                                <input type="reset" value="CLEAR"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="shop-tab-area">
                        <div class="shop-tab-list">
                            <div class="shop-tab-pill pull-left">
                                <ul>
                                    <li class="active" id="left"><a data-toggle="pill" href="#home"><i
                                                class="fa fa-th"></i><span>Grid</span></a></li>
                                    <li><a data-toggle="pill" href="#menu1"><i
                                                class="fa fa-th-list"></i><span>List</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="row tab-pane fade in active" id="home">
                                <div class="shop-single-product-area">
                                    @foreach($products as $product)
                                        <div class="col-md-4 col-sm-6">
                                            <div class="single-banner">
                                                <div class="product-wrapper">
                                                    <a href="{{route('frontend.detail',$product->slug)}}"
                                                       class="single-banner-image-wrapper">
                                                        @if($product->avatar)
                                                            <img alt=""
                                                                 src="{{asset('storage/images/product/avatar/'.$product->avatar)}}"
                                                                 style="height: 280px;width: 270px">
                                                        @else
                                                            <img alt="" src="{{asset('frontend/img/featured/1.jpg')}}">
                                                        @endif
                                                        @if(isset($product->sale))
                                                            <div class="price"><span class="badge"
                                                                                     style="background-color:red">sale</span>
                                                            </div>
                                                        @endif
                                                    </a>
                                                    <div class="product-description">
                                                        <div class="functional-buttons">
                                                            <a href="#" title="Add to Wishlist">
                                                                <i class="fa fa-heart-o"></i>
                                                            </a>
                                                            <a href="#" title="Quick view"
                                                               data-product="{{$product->id}}"
                                                               class="quickviewProduct">
                                                                <i class="fa fa-compress"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="banner-bottom text-center">
                                                    @if(isset($product->sale))
                                                        <div class="banner-bottom-title">
                                                            <p>
                                                                <strike>{{number_format($product->price_sell)}}</strike> {{number_format($product->sale)}}
                                                                vnđ</p>
                                                        </div>
                                                    @else
                                                        <div class="banner-bottom-title">
                                                            <p>{{number_format($product->price_sell)}} vnđ</p>
                                                        </div>
                                                    @endif

                                                    <div class="banner-bottom-title">
                                                        <a href="#">{{$product->name}}</a>
                                                    </div>
                                                    <div class="rating-icon">
                                                        @for($i = 1; $i<=5 ; $i++)
                                                            @if($i <= $product->avg)
                                                                <span class="fa fa-star icolor"></span>
                                                            @else
                                                                <span class="fa fa-star"></span>
                                                            @endif
                                                        @endfor
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>

                            </div>
                            <div id="menu1" class="tab-pane fade">
                                <div class="row">
                                    @foreach($products as $product)
                                        <div class="single-shop-product">
                                            <div class="col-xs-12 col-sm-5 col-md-4">
                                                <div class="left-item">
                                                    <a href="{{route('frontend.detail',$product->slug)}}" title="East of eden">
                                                        @if($product->avatar)
                                                            <img alt=""
                                                                 src="{{asset('storage/images/product/avatar/'.$product->avatar)}}"
                                                                 style="height: 280px">
                                                        @else
                                                            <img alt=""
                                                                 src="{{asset('storage/images/product/avatar/demo.png')}}">
                                                        @endif
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-7 col-md-8">
                                                <div class="deal-product-content">
                                                    <h4>
                                                        <a href="{{route('frontend.detail',$product->slug)}}"
                                                           title="East of eden">{{$product->name}}</a>
                                                    </h4>
                                                    <div class="product-price">
                                                        @if(isset($product->sale))
                                                            <span class="new-price">{{number_format($product->sale)}} vnđ</span>
                                                            <span class="old-price">{{number_format($product->price_sell)}} vnđ</span>
                                                            <div class="price"><span class="badge"
                                                                                     style="background-color:red">sale</span>
                                                            </div>
                                                        @else
                                                            <span>{{number_format($product->price_sell)}} vnđ</span>
                                                        @endif
                                                    </div>
                                                    <div class="list-rating-icon">
                                                        <i class="fa fa-star icolor"></i>
                                                        <i class="fa fa-star icolor"></i>
                                                        <i class="fa fa-star icolor"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <p>Faded short sleeves t-shirt with high neckline. Soft and stretchy
                                                        material for a comfortable fit. Accessorize with a straw hat and
                                                        you're ready for summer!</p>
                                                    <div class="availability">
                                                        <span><a href="cart.html">Thêm vào giỏ hàng</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                        <div style="float: right">
                            {!! $products->links() !!}
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
                                    <img id="quickImage" src=""
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
                                        <button class="single_add_to_cart_button" product_id="" type="submit">Thêm vào
                                            giỏ hàng
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

