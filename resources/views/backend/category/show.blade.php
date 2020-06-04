@extends('backend.layout.master')

@section('title')
    Detail
@endsection
@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chi tiết danh mục</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('backend.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Chi tiết danh mục</li>
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
                        {{--                        <h3 class="d-inline-block d-sm-none">{{asset('backend/dist/img/product/avatar/'. $category->image)}}</h3>--}}
                        <div class="col-12">
                            @if($category->image)
                                <img src="{{asset('storage/images/category/'. $category->image)}}"
                                     class="product-image" alt="Product Image">
                            @else
                                <img src="{{asset('storage/images/category/demo.png')}}"
                                     class="product-image" alt="Product Image">
                            @endif
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3"><a href="{{route('frontend.products',$category->slug)}}">{{$category->name}}</a></h3>
                        <p>{{$category->slug}}</p>

                        <hr>

                        <h4>Độ sâu: {{$category->depth}}</h4>

                        <div>Danh mục cha:</div>
                        <div>
                            @if($category->parent)
                                <a href="{{route('Category.show',$category->parent->id)}}">{{$category->parent->name}}</a>
                            @else
                                <p>Không có</p>
                            @endif
                        </div>
                        <div>
                            Danh mục con:
                        </div>
                        <div>
                            @if($category->child)
                                @foreach($category->child as $value)
                                    <a href="{{route('Category.show',$value->id)}}">{{$value->name}}</a>,
                                @endforeach
                            @else
                                <p>Không có</p>
                            @endif
                        </div>

                    </div>
                </div>
                <div class="row mt-4">
                    <nav class="w-100">
                        <div class="nav nav-tabs" id="product-tab" role="tablist">
                            <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab"
                               href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Mô
                                tả</a>
                            <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab"
                               href="#product-comments" role="tab" aria-controls="product-comments"
                               aria-selected="false">Các sản phẩm</a>
                        </div>
                    </nav>
                    <div class="tab-content p-3" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="product-desc" role="tabpanel"
                             aria-labelledby="product-desc-tab"> {!!$category->content!!}
                        </div>
                        <div class="tab-pane fade" id="product-comments" role="tabpanel"
                             aria-labelledby="product-comments-tab">
                            <div class="col-12 product-image-thumbs">
                                @foreach($products as $product)
                                    <div class="product-image-thumb active" style="display: inline-block">
                                        <a href="{{route('Product.show',$product->id)}}">
                                            @if($product->avatar)
                                                <img
                                                    src="{{asset('storage/images/product/avatar/'. $product->avatar)}}"
                                                    alt="Product Image" style="height: 100px">
                                            @else
                                                <img
                                                    src="{{asset('storage/images/images/product/avatar/demo.png')}}"
                                                    alt="Product Image">
                                            @endif
                                        </a>
                                        <div>
                                            {{$product->name}}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
