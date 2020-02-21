@extends('frontend.layout.master')

@section('titlie')
    Blogs
@endsection

@section('header-content')
    <div class="breadcrumbs-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div style="background: none;padding-top: 140px;padding-bottom: 140px;">
                        <h2 style="color: #000000">Blog</h2>
                        <ul class="breadcrumbs-list">
                            <li>
                                <a title="Return to Home" href="{{route('frontend.home')}}">Home</a>
                            </li>
                            <li>blog</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('content')
    <div class="shopping-area section-padding">
        <div class="container">
            @if(isset($key))
                <div>
                    <h3>Từ khóa: {{$key}}</h3>
                </div>
            @endif
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="shop-tab-area">
                        <div class="shop-tab-list">
                            <div class="shop-tab-pill pull-left">
                                <ul>
                                    <li class="active"><a data-toggle="pill" href="#menu1"><i
                                                class="fa fa-th-list"></i><span>List</span></a></li>
                                </ul>
                            </div>
                            <div class="shop-tab-pill pull-right">
                                <form action="{{route('Post.search')}}" method="get" style="display: flex">
                                    @csrf
                                    <input type="text" name="key" class="form-control float-right"
                                           placeholder="Search">
                                    <input type="text" hidden name="role" value="1">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div id="home" class="row tab-pane fade in active" id="home"
                                 style="max-width: 1140px;margin: 0 auto;">
                                <div class="row">
                                    @foreach($posts as $post)
                                        <div class="single-shop-product">
                                            <div class="col-xs-12 col-sm-5 col-md-4">
                                                <div class="left-item">
                                                    <a href="{{route('frontend.post',$post->id)}}" title="East of eden">
                                                        <img alt=""
                                                             src="{{asset('storage/images/post/'.$post->thumbnail)}}"
                                                             style="height: 280px">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-7 col-md-8">
                                                <div class="deal-product-content">
                                                    <h4>
                                                        <a href="{{route('frontend.post',$post->id)}}"
                                                           title="East of eden">{{$post->title}}</a>
                                                    </h4>

                                                    <p>{{$post->description}}</p>

                                                    <div>
                                                        <i class="fa fa-eye"></i>
                                                        Lượt xem: {{$post->view}}
                                                    </div>
                                                    <div>
                                                        bởi: {{$post->User->name}}
                                                    </div>
                                                    <div>
                                                        Ngày đăng: {{date_format($post->created_at,'d-m-Y')}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                        <div style="float: right">
                            {!! $posts->links() !!}
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

