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
                        <h3 class="d-inline-block d-sm-none">{{asset('backend/dist/img/product/avatar/'. $product->avatar)}}</h3>
                        <div class="col-12">
                            <img src="{{asset('backend/dist/img/product/avatar/'. $product->avatar)}}"
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
                        <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown
                            aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure
                            terr.</p>

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

                        <div class="bg-gray py-2 px-3 mt-4">
                            <h2 class="mb-0">
                                Giá bán: {{$product->price_sell}} đ
                            </h2>
                            <h4 class="mt-0">
                                <small>Giá nhập: {{$product->price_import}} đ </small>
                            </h4>
                        </div>

                    </div>
                </div>
                <div class="row mt-4">
                    <nav class="w-100">
                        <div class="nav nav-tabs" id="product-tab" role="tablist">
                            <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab"
                               href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                            <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab"
                               href="#product-comments" role="tab" aria-controls="product-comments"
                               aria-selected="false">Comments</a>
                            <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab"
                               href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
                        </div>
                    </nav>
                    <div class="tab-content p-3" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="product-desc" role="tabpanel"
                             aria-labelledby="product-desc-tab"> Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit. Morbi vitae condimentum erat. Vestibulum ante ipsum primis in faucibus orci luctus et
                            ultrices posuere cubilia Curae; Sed posuere, purus at efficitur hendrerit, augue elit
                            lacinia arcu, a eleifend sem elit et nunc. Sed rutrum vestibulum est, sit amet cursus dolor
                            fermentum vel. Suspendisse mi nibh, congue et ante et, commodo mattis lacus. Duis varius
                            finibus purus sed venenatis. Vivamus varius metus quam, id dapibus velit mattis eu. Praesent
                            et semper risus. Vestibulum erat erat, condimentum at elit at, bibendum placerat orci.
                            Nullam gravida velit mauris, in pellentesque urna pellentesque viverra. Nullam non
                            pellentesque justo, et ultricies neque. Praesent vel metus rutrum, tempus erat a, rutrum
                            ante. Quisque interdum efficitur nunc vitae consectetur. Suspendisse venenatis, tortor non
                            convallis interdum, urna mi molestie eros, vel tempor justo lacus ac justo. Fusce id enim a
                            erat fringilla sollicitudin ultrices vel metus.
                        </div>
                        <div class="tab-pane fade" id="product-comments" role="tabpanel"
                             aria-labelledby="product-comments-tab"> Vivamus rhoncus nisl sed venenatis luctus. Sed
                            condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Donec et finibus sem, ut
                            commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis odio. Nulla
                            turpis elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar
                            mauris ornare, eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex
                            elit euismod lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a
                            sapien eget, ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit vel
                            id dui. Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum.
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
