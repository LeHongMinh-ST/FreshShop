@extends('backend.layout.master')

@section('title')
    Show product
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

@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chi tiết sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Chi tiết</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection


@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <h3 class="d-inline-block d-sm-none">{{asset('storage/images/product/avatar/'. $product->avatar)}}</h3>
                        <div class="col-12">
                            <img src="{{asset('storage/images/product/avatar/'. $product->avatar)}}"
                                 class="product-image" alt="Product Image">
                        </div>
                        <div class="col-12 product-image-thumbs">
                            @foreach($images as $image)
                                <div class="product-image-thumb active"><img
                                        src="{{asset($image->path. '/'. $image->name)}}"
                                        alt="Product Image"></div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3">{{$product->name}}</h3>
                        <hr>
                        <h4>Danh mục</h4>
                        <div>
                            {{$product->category}}
                        </div>

                        <h4 class="mt-3">Tình trạng</h4>
                        <div>
                            @if($product->status == 1)
                                <span class="badge badge-success">
                                    Còn hàng
                                </span>
                            @elseif($product->status == 0)
                                <span class="badge badge-danger">
                                    Hết hàng
                                </span>
                            @else
                                <span class="badge badge-warning">
                                    Đang nhập
                                </span>
                            @endif
                        </div>

                        <h4 class="mt-3">Đơn vị</h4> <span>{{$product->unit}}</span>

                        <div class="bg-gray py-2 px-3 mt-4">
                            @if(isset($product->price_sale))
                                <h2 class="mb-0">
                                    Giá bán: <strike>{{number_format($product->price_sell)}}
                                        vnđ </strike> {{number_format($product->price_sale)}} vnđ
                                    <span class="badge badge-danger">
                                        Sale
                                    </span>
                                </h2>
                            @else
                                <h2 class="mb-0">
                                    Giá bán: {{number_format($product->price_sell)}} vnđ
                                </h2>
                            @endif

                            <h4 class="mt-0">
                                <small>Giá nhập: {{number_format($product->price_import)}} vnđ </small>
                            </h4>
                        </div>

                    </div>
                </div>
                <div class="row mt-4">
                    <nav class="w-100">
                        <div class="nav nav-tabs" id="product-tab" role="tablist">
                            <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab"
                               href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Mô tả
                                sản phẩm</a>
                            <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab"
                               href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Đánh
                                giá</a>
                            <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab"
                               href="#product-comments" role="tab" aria-controls="product-comments"
                               aria-selected="false">Bình luận</a>
                        </div>
                    </nav>
                    <div class="tab-content p-3" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="product-desc" role="tabpanel"
                             aria-labelledby="product-desc-tab"> {!! $product->content !!}
                        </div>
                        <div class="tab-pane fade" id="product-rating" role="tabpanel"
                             aria-labelledby="product-rating-tab">
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
                                <h3>Chưa có đánh giá!</h3>
                            @endif
                        </div>
                        <div class="tab-pane fade" id="product-comments" role="tabpanel"
                             aria-labelledby="product-comments-tab">
                            @if($comments->count() == 0)
                                <h3>Chưa có bình luận!</h3>
                            @else
                                @foreach($comments as $comment)
                                    <div class="media">
                                        <img style="width: 64px; height: 64px; border-radius: 50%; "
                                             class="align-self-start mr-3"
                                             src="{{asset('storage/images/user/avatar/default-avatar.png')}}"
                                             alt="Generic placeholder image">
                                        <div class="media-body">
                                            <h5 class="mt-0">{{$comment->User->name}}</h5>
                                            <p>{{$comment->comment}}</p>
                                        </div>
                                        <div>
                                            <form action="{{route('Comment.destroy',$comment->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="close" aria-label="Close">
                                                    <span aria-hidden="true" style="color:red;">&times;</span>
                                                </button>
                                            </form>
                                        </div>

                                    </div>

                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection

