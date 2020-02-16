@extends('frontend.layout.master')

@section('title')
    Product
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
    <div class="single-product-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-7">
                    <div class="single-product-image-inner">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="one">
                                <a class="venobox" href="img/single-product/bg-1.jpg" data-gall="gallery" title="">
                                    @if($product->avatar)
                                        <img alt=""
                                             src="{{asset('storage/images/product/avatar/'.$product->avatar)}}"
                                             style="height: 550px">
                                    @else
                                        <img alt="" src="{{asset('frontend/img/single-product/bg-1.jpg')}}">
                                    @endif
                                </a>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="two">
                                <a class="venobox" href="img/single-product/bg-2.jpg" data-gall="gallery" title="">
                                    <img src="img/single-product/bg-2.jpg" alt="">
                                </a>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="three">
                                <a class="venobox" href="img/single-product/bg-3.jpg" data-gall="gallery" title="">
                                    <img src="img/single-product/bg-3.jpg" alt="">
                                </a>
                            </div>
                        </div>
                        <!-- Nav tabs -->
                        <ul class="product-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#one" aria-controls="one" role="tab"
                                                                      data-toggle="tab"><img
                                        src="img/single-product/1.jpg" alt=""></a></li>
                            <li role="presentation"><a href="#two" aria-controls="two" role="tab" data-toggle="tab"><img
                                        src="img/single-product/2.jpg" alt=""></a></li>
                            <li role="presentation"><a href="#three" aria-controls="three" role="tab" data-toggle="tab"><img
                                        src="img/single-product/3.jpg" alt=""></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-sm-5">
                    <div class="single-product-details">
                        <div class="list-pro-rating">
                            <i class="fa fa-star icolor"></i>
                            <i class="fa fa-star icolor"></i>
                            <i class="fa fa-star icolor"></i>
                            <i class="fa fa-star icolor"></i>
                            <i class="fa fa-star"></i>
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
                                <h2>{{number_format($product->price_sell)}} vnđ</h2>
                            @endif
                        </div>
                        <div class="product-attributes clearfix">
                            <form action="" method="">
                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                <span class="pull-left" id="quantity-wanted-p">
									<span class="dec qtybutton">-</span>
									<input type="text" value="1" name="qty_prouct" class="cart-plus-minus-box">
									<span class="inc qtybutton">+</span>
								</span>
                                <span>
                                    <button class="cart-btn btn-default add_cart"
                                            product_id_cart="{{$product->id}}">
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
                        <div id="product-comments-block-extra">
                            <ul class="comments-advices">
                                <li>
                                    <a href="#" class="open-comment-form">Write a review</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="p-details-tab-content">
                        <div class="p-details-tab">
                            <ul class="p-details-nav-tab" role="tablist">
                                <li role="presentation" class="active"><a href="#more-info" aria-controls="more-info"
                                                                          role="tab" data-toggle="tab">Giới thiệu sản
                                        phẩm</a>
                                </li>
                                <li role="presentation"><a href="#data" aria-controls="data" role="tab"
                                                           data-toggle="tab">Review</a></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                        <div class="tab-content review">
                            <div role="tabpanel" class="tab-pane active" id="more-info">
                                <p>{!!$product->content!!}</p>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="data">
                                <table class="table-data-sheet">
                                    <tbody>
                                    <tr class="odd">
                                        <td>Compositions</td>
                                        <td>Cotton</td>
                                    </tr>
                                    <tr class="even">
                                        <td>Styles</td>
                                        <td>Casual</td>
                                    </tr>
                                    <tr class="odd">
                                        <td>Properties</td>
                                        <td>Short Sleeve</td>
                                    </tr>
                                    </tbody>
                                </table>
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
                                    <a href="#" class="single-banner-image-wrapper">
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
                                            <a href="#" title="Quick view"
                                               data-product="{{$product->id}}"
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
    <script>
        $(document).ready(function () {
            $('.add_cart').click(function (event) {
                event.preventDefault();
                let id = $(this).attr('product_id_cart');
                console.log(id);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "/Cart/create",
                    type: "post",
                    dateType: "",
                    data: {
                        'id': id,
                        '_token': $('input[name=_token]').val(),
                        'qty': $('input[name=qty_prouct]').val(),
                    },
                    success: function (result) {
                        $(".number_cart").text(result);
                        // $(".alert-create").text('Thêm thành công');
                    }
                });
            });
        });
    </script>
@endsection
