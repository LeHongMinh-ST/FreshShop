@extends('backend.layout.master')

@section('title')
    Show product
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
                               href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Mô tả sản phẩm</a>
                            <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab"
                               href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
                        </div>
                    </nav>
                    <div class="tab-content p-3" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="product-desc" role="tabpanel"
                             aria-labelledby="product-desc-tab"> {!! $product->content !!}
                        </div>
                        <div class="tab-pane fade" id="product-rating" role="tabpanel"
                             aria-labelledby="product-rating-tab"> Cras ut ipsum ornare, aliquam ipsum non, posuere
                            elit. In hac habitasse platea dictumst. Aenean elementum leo augue, id fermentum risus
                            efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel ipsum felis. Ut molestie,
                            purus aliquam placerat sollicitudin, mi ligula euismod neque, non bibendum nibh neque et
                            erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam efficitur
                            lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl. Nullam metus odio,
                            malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit, at accumsan
                            urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta lectus, at
                            mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper. Donec
                            varius massa at semper posuere. Integer finibus orci vitae vehicula placerat.
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
