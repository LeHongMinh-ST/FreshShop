@extends('frontend.layout.master')

@section('title')
    Product
@endsection

@section('css')
    <style>

        .fa {
            font-size: 25px;
        }

        .checked {
            color: orange;
        }

        /* Three column layout */
        .side {
            float: left;
            width: 15%;
            margin-top: 10px;
        }

        .middle {
            margin-top: 10px;
            float: left;
            width: 70%;
        }

        /* Place text to the right */
        .right {
            text-align: right;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* The bar container */
        .bar-container {
            width: 100%;
            background-color: #f1f1f1;
            text-align: center;
            color: white;
        }

        /* Individual bars */
        .bar-5 {
            width: 60%;
            height: 18px;
            background-color: #4CAF50;
        }

        .bar-4 {
            width: 30%;
            height: 18px;
            background-color: #2196F3;
        }

        .bar-3 {
            width: 10%;
            height: 18px;
            background-color: #00bcd4;
        }

        .bar-2 {
            width: 4%;
            height: 18px;
            background-color: #ff9800;
        }

        .bar-1 {
            width: 15%;
            height: 18px;
            background-color: #f44336;
        }

        /* Responsive layout - make the columns stack on top of each other instead of next to each other */
        @media (max-width: 400px) {
            .side, .middle {
                width: 100%;
            }

            .right {
                display: none;
            }

    </style>
@endsection

@section('header-content')
    <div class="breadcrumbs-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumbs">
                        <h2>Chi tiết sản phẩm</h2>
                        <ul class="breadcrumbs-list">
                            <li>
                                <a title="Return to Home" href="index.html">Home</a>
                            </li>
                            <li>Chi tiết sản phẩm</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    @if(session()->has('success'))
        <div style="display:none;" class="success">{{session()->pull('success')}}</div>
    @endif

    @if(session()->has('error'))
        <div style="display:none;" class="error">{{session()->pull('error')}}</div>
    @endif

    @if(session()->has('rate-success'))
        <div style="display:none;" class="error">{{session()->pull('rate-success')}}</div>
    @endif
    <div class="single-product-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-7">
                    <div class="single-product-image-inner">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="one">
                                <a class="venobox" href="" data-gall="gallery" title="">
                                    @if($product->avatar)
                                        <img alt=""
                                             src="{{asset('storage/images/product/avatar/'.$product->avatar)}}"
                                             style="height: 550px">
                                    @else
                                        <img alt="" src="{{asset('frontend/img/single-product/bg-1.jpg')}}">
                                    @endif
                                </a>
                            </div>
                        </div>
                        <!-- Nav tabs -->
                        <ul class="product-tabs" role="tablist">
                            @foreach($product->Images as $image )
                                <li role="presentation" class="active"><a href="#one" aria-controls="one" role="tab"
                                                                          data-toggle="tab"><img
                                            src="{{asset($image->path.'/'.$image->name)}}" alt=""
                                            style="width: 150px; height: 160px"></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-sm-5">
                    <div class="single-product-details">
                        <div class="list-pro-rating">
                            @for($i =1;$i<=5;$i++)
                                @if($i<=$avg)
                                    <i class="fa fa-star icolor"></i>
                                @else
                                    <i class="fa fa-star"></i>
                                @endif
                            @endfor
                        </div>
                        <h2>{{$product->name}}</h2>
                        <div>
                            <span></span>
                        </div>
                        <p></p>
                        <div class="single-product-price">
                            @if(isset($product->sale))
                                <h2>
                                    <strike>{{number_format($product->price_sell)}}</strike> {{number_format($product->sale)}}
                                    vnđ</h2>
                                <span class="badge badge-danger" style="background-color: red">
                                        Sale
                                    </span>
                            @else
                                <h2>{{number_format($product->price_sell)}} vnđ/{{$product->unit}}</h2>
                            @endif
                        </div>
                        <div class="product-attributes clearfix">
                            <form action="{{route('cart.store',$product->id)}}" method="post">
                                @csrf
                                <span class="pull-left" id="quantity-wanted-p">
									<span class="dec qtybutton">-</span>
									<input type="text" value="1" min="0" max="{{$product->remain}}" name="qty_product"
                                           class="cart-plus-minus-box">
									<span class="inc qtybutton">+</span>
								</span>
                                <span>
                                    <button class="cart-btn btn-default add_cart" @if($product->status != 1) disabled @endif>
                                        <i class="flaticon-shop"></i>
                                        Thêm vào giỏ hàng
                                    </button>
                               </span>
                            </form>
                        </div>
                        <div class="add-to-wishlist">
                            <a class="wish-btn" href="cart.html">
                                <i class="fa fa-heart-o"></i>
                                Thêm vào danh sách ưa thích
                            </a>
                        </div>
                        <div class="single-product-categories">
                            <label>Tình trạng: </label>
                            @if($product->status == 1)
                                <span>Còn hàng</span>
                            @else
                                <span>Hết hàng</span>
                            @endif
                        </div>
                        <div class="single-product-categories">
                            <label>Danh mục:</label>
                            <span>{{$product->category}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="p-details-tab-content">
                        <div class="p-details-tab">
                            <ul class="p-details-nav-tab" role="tablist">
                                <li role="presentation" class="active"><a href="#more-info"
                                                                          style="text-decoration-line: none"
                                                                          aria-controls="more-info"
                                                                          role="tab" data-toggle="tab">Giới thiệu sản
                                        phẩm</a>
                                </li>
                                <li role="presentation"><a href="#data" style="text-decoration-line: none"
                                                           aria-controls="data" role="tab"
                                                           data-toggle="tab">Đánh giá sản phẩm</a></li>
                                <li role="presentation"><a href="#reviews" style="text-decoration-line: none"
                                                           aria-controls="reviews" role="tab"
                                                           data-toggle="tab">Bình luận</a></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                        <div class="tab-content review">
                            <div role="tabpanel" class="tab-pane active" id="more-info">
                                <p>{!!$product->content!!}</p>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="data">
                                <span class="heading">Đánh giá của người mua</span>
                                @for($i =1;$i<=5;$i++)
                                    @if($i<=$avg)
                                        <span class="fa fa-star checked"></span>
                                    @else
                                        <span class="fa fa-star"></span>
                                    @endif
                                @endfor
                                <p>{{number_format($avg,2)}} <span class="fa fa-star checked"></span>
                                    bởi {{$rates->count()}} đánh giá</p>
                                <hr style="border:3px solid #f1f1f1">
                                <div class="row">
                                    @guest
                                        <div class="row"><a href="{{route('login.form-guest')}}" class="btn">Đăng nhập và mua hàng
                                                để đánh giá!</a></div>
                                    @else
                                        @if($check)
                                            <div><h2>Đánh giá sản phẩm: </h2></div>
                                            <div>
                                                <form action="{{route('Rate.store',$product->id)}}" class="form-row"
                                                      method="post">
                                                    @csrf
                                                    <div class="rate_star">
                                                        <input type="text" hidden class="rate" value="" name="rate">
                                                        <span class="list_star">
                                                            @for($i=1;$i<=5;$i++)
                                                                <i class="fa fa-star" data_key="{{$i}}"></i>
                                                            @endfor
                                                        </span>
                                                    </div>
                                                    <i class="fa fa-pen"></i>
                                                    <label for="">Viết đánh giá: </label>
                                                    <textarea style="resize: vertical" class="form-control comment-rate"
                                                              name="comment"
                                                              cols="30" rows="3"></textarea>
                                                    <button class="btn btn-default btn-rate" disabled="disabled"
                                                            type="submit">Gửi
                                                    </button>
                                                </form>
                                            </div>
                                        @else
                                            <div style="max-width: 845px; margin: 0 auto;"><h2>Mua hàng để đánh giá sản phẩm!</h2></div>
                                        @endif
                                    @endguest
                                        <div style="max-width: 845px; margin: 0 auto;">Đánh giá của người dùng: </div>
                                    @if($rates->count() > 0)
                                        @foreach($rates as $rate)
                                            <div class="media row">
                                                <div>
                                                    @auth
                                                        @if(Auth::user()->id == $rate->user_id || Auth::user()->role ==1)
                                                            <form
                                                                action="{{route('frontend.post_comment.destroy',$rate->id)}}"
                                                                method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="close" aria-label="Close">
                                                                <span aria-hidden="true"
                                                                      style="color:red;">&times;</span>
                                                                </button>
                                                            </form>
                                                        @endif
                                                    @endauth
                                                </div>
                                                <img style="width: 64px; height: 64px; border-radius: 50%; "
                                                     class="align-self-start mr-3"
                                                     src="{{asset('storage/images/user/avatar/default-avatar.png')}}"
                                                     alt="Generic placeholder image">

                                                <div class="media-body">
                                                    <h5 class="mt-0">{{$rate->Customer->name}}</h5>
                                                    <span>
                                                        @for($i=1;$i<=5;$i++)
                                                            @if($i<=$rate->rate)
                                                                <i class="fa fa-star" style="color:orange;"></i>
                                                            @else
                                                                <i class="fa fa-star"></i>
                                                            @endif
                                                        @endfor
                                                    </span>
                                                    <p>{{$rate->comment}}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <h3 style="max-width: 845px; margin: 0 auto;">Chưa có đánh giá!</h3>
                                    @endif
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="reviews">
                                <div id="product-comments-block-tab">
                                    @guest
                                        <div><a href="{{route('login.form-guest')}}" class="btn">Đăng nhập để bình
                                                luận!</a></div>
                                    @else
                                        <form action="{{route('Comment.store',$product->id)}}" class="form-row"
                                              method="post">
                                            @csrf
                                            <i class="fa fa-pen"></i>
                                            <label for="">Viết bình luận: </label>
                                            <div>
                                                <textarea style="resize: vertical" class="form-control" name="comment"
                                                          cols="30" rows="3"></textarea>
                                            </div>
                                            <button class="btn btn-default" type="submit">Gửi</button>
                                        </form>
                                    @endguest

                                    @if($comments->count() == 0)
                                        <h3>Chưa có bình luận!</h3>
                                    @else
                                        @foreach($comments as $comment)
                                            <div class="media">
                                                <div>
                                                    @auth
                                                        @if(Auth::user()->id == $comment->user_id || Auth::user()->role ==1)
                                                            <form
                                                                action="{{route('frontend.post_comment.destroy',$comment->id)}}"
                                                                method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="close" aria-label="Close">
                                                                <span aria-hidden="true"
                                                                      style="color:red;">&times;</span>
                                                                </button>
                                                            </form>
                                                        @endif
                                                    @endauth
                                                </div>
                                                <img style="width: 64px; height: 64px; border-radius: 50%; "
                                                     class="align-self-start mr-3"
                                                     src="{{asset('storage/images/user/avatar/default-avatar.png')}}"
                                                     alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <h5 class="mt-0">{{$comment->User->name}}</h5>
                                                    <p>{{$comment->comment}}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Single Product Area End -->
    <!-- Related Product Area Start -->
    <div class="related-product-area">
        <h2 class="section-title">Sản phẩm cùng loại</h2>
        <div class="container">
            <div class="row">
                <div class="related-product indicator-style">
                    @foreach($products_related as $product_related)
                        <div class="col-md-3">
                            <div class="single-banner">
                                <div class="product-wrapper">
                                    <a href="{{route('frontend.detail',$product_related->slug)}}"
                                       class="single-banner-image-wrapper">
                                        @if($product_related->avatar)
                                            <img alt=""
                                                 src="{{asset('storage/images/product/avatar/'.$product_related->avatar)}}"
                                                 style="height: 280px">
                                        @else
                                            <img alt=""
                                                 src="{{asset('backend/dist/img/product/avatar/demo.png')}}"
                                                 style="height: 280px">
                                        @endif
                                        <div class="price">
                                            @if(isset($product_related->sale))
                                                <span class="badge"
                                                      style="background-color:red">sale</span>
                                            @endif
                                        </div>
                                        <div class="rating-icon">
                                            @for($i=1;$i<=5;$i++)
                                                @if($i <= $product_related->avg)
                                                    <i class="fa fa-star icolor"></i>
                                                @else
                                                    <i class="fa fa-star"></i>
                                                @endif
                                            @endfor
                                        </div>
                                    </a>
                                    <div class="product-description">
                                        <div class="functional-buttons">
                                            <a href="#" title="Add to Wishlist">
                                                <i class="fa fa-heart-o"></i>
                                            </a>
                                            <a href="#" title="Quick view"
                                               data-product="{{$product_related->id}}"
                                               class="quickviewProduct">
                                                <i class="fa fa-compress"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="banner-bottom text-center">
                                    @if(isset($product_related->sale))
                                        <p>
                                            <strike>{{number_format($product_related->price_sell)}}</strike> {{number_format($product_related->sale)}}
                                            vnđ</p>
                                    @else
                                        <p>{{number_format($product_related->price_sell)}} vnđ</p>
                                    @endif
                                </div>
                                <div class="banner-bottom text-center">
                                    <a href="#">{{$product_related->name}}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
@section('script')

@endsection
