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
                                             src="{{asset('storage/images/product/avatar/'.$product->avatar)}}" style="height: 550px">
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
                            <li role="presentation" class="active"><a href="#one" aria-controls="one" role="tab" data-toggle="tab"><img src="img/single-product/1.jpg" alt=""></a></li>
                            <li role="presentation"><a href="#two" aria-controls="two" role="tab" data-toggle="tab"><img src="img/single-product/2.jpg" alt=""></a></li>
                            <li role="presentation"><a href="#three" aria-controls="three" role="tab" data-toggle="tab"><img src="img/single-product/3.jpg" alt=""></a></li>
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
                        <div class="availability">
                            <span>In stock</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </p>
                        <div class="single-product-price">
                            <h2>{{$product->price_sell}} đ</h2>
                        </div>
                        <div class="product-attributes clearfix">
                                <span class="pull-left" id="quantity-wanted-p">
									<span class="dec qtybutton">-</span>
									<input type="text" value="1" class="cart-plus-minus-box">
									<span class="inc qtybutton">+</span>
								</span>
                            <span>
                                    <a class="cart-btn btn-default" href="cart.html">
                                        <i class="flaticon-shop"></i>
                                        Add to cart
                                    </a>
                               </span>
                        </div>
                        <div class="add-to-wishlist">
                            <a class="wish-btn" href="cart.html">
                                <i class="fa fa-heart-o"></i>
                                ADD TO WISHLIST
                            </a>
                        </div>
                        <div class="single-product-categories">
                            <label>Categories:</label>
                            <span>e-book, biological, business</span>
                        </div>
                        <div class="social-share">
                            <label>Share: </label>
                            <ul class="social-share-icon">
                                <li><a href="#"><i class="flaticon-social"></i></a></li>
                                <li><a href="#"><i class="flaticon-social-1"></i></a></li>
                                <li><a href="#"><i class="flaticon-social-2"></i></a></li>
                            </ul>
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
                                <li role="presentation" class="active"><a href="#more-info" aria-controls="more-info" role="tab" data-toggle="tab">Description</a></li>
                                <li role="presentation"><a href="#data" aria-controls="data" role="tab" data-toggle="tab">Review</a></li>
                                <li role="presentation"><a href="#reviews" aria-controls="reviews" role="tab" data-toggle="tab">Tab</a></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                        <div class="tab-content review">
                            <div role="tabpanel" class="tab-pane active" id="more-info">
                                <p>Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which have since evolved into a full ready-to-wear collection in which every item is a vital part of a woman's wardrobe. The result? Cool, easy, chic looks with youthful elegance and unmistakable signature style. All the beautiful pieces are made in Italy and manufactured with the greatest attention. Now Fashion extends to a range of accessories including shoes, hats, belts and more!</p>
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
                            <div role="tabpanel" class="tab-pane" id="reviews">
                                <div id="product-comments-block-tab">
                                    <a href="#" class="comment-btn"><span>Be the first to write your review!</span></a>
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
        <h2 class="section-title">RELATED PRODUCTS</h2>
        <div class="container">
            <div class="row">
                <div class="related-product indicator-style">
                    <div class="col-md-3">
                        <div class="single-banner">
                            <div class="product-wrapper">
                                <a href="#" class="single-banner-image-wrapper">
                                    <img alt="" src="img/featured/1.jpg">
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
                                        <a href="#" title="Quick View">
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
                                    <img alt="" src="img/featured/2.jpg">
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
                                        <a href="#" title="Quick view" data-toggle="modal" data-target="#productModal">
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
                                    <img alt="" src="img/featured/3.jpg">
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
                                        <a href="#" title="Quick view" data-toggle="modal" data-target="#productModal">
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
                                    <img alt="" src="img/featured/4.jpg">
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
                                        <a href="#" title="Quick view" data-toggle="modal" data-target="#productModal">
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
                    <div class="col-md-3">
                        <div class="single-banner">
                            <div class="product-wrapper">
                                <a href="#" class="single-banner-image-wrapper">
                                    <img alt="" src="img/featured/5.jpg">
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
                                        <a href="#" title="Quick view" data-toggle="modal" data-target="#productModal">
                                            <i class="fa fa-compress"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="banner-bottom text-center">
                                <a href="#">Twilight</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="single-banner">
                            <div class="product-wrapper">
                                <a href="#" class="single-banner-image-wrapper">
                                    <img alt="" src="img/featured/6.jpg">
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
                                        <a href="#" title="Quick view" data-toggle="modal" data-target="#productModal">
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
            </div>
        </div>
    </div>
@endsection
